<?php
/**
 * Created by PhpStorm.
 * User: xubuntu2045
 * Date: 07.05.2018
 * Time: 15:13
 */

namespace Mavitm\Restful\Classes;

use Log;
use Event;
use Input;
use Request;
use Response;
use ApplicationException;
use RainLab\User\Models\User;
use October\Rain\Argon\Argon;
use Mavitm\Restful\Models\Api;
use Mavitm\Restful\Models\Counter;

class Restful
{
    /**
     * User Model
     * @var object
     */
    protected $user;

    /**
     * Api model
     * @var object
     */
    public $api;

    /**
     * apiye istek yapilan url adresi
     * @var
     */
    public $requestUrl, $request_body;

    /**
     * requests from user
     * @var array
     */
    public $requestData;

    /**
     * @var Model
     */
    public $targetModel, $targetModelJsonableFields, $targetModelPrimary;

    /**
     * gonderilen data veta degistirilen data
     * @var array
     */
    public $apiData;

    /**
     * response header status code
     * @var int
     */
    public $headCode = 0;

    /**
     * counter log external variable (optional)
     * @var
     */
    public $contentID, $contentType;

    /**
     *
     * @var array
     */
    public $dynamicValues = [];

    /**
     * component
     * @var Controller
     */
    public $context;

    /**
     *  optional before and after events
     * @var array
     */
    public $externalSpecialEvents = ["before" => null, "after" => null];

    public function __construct()
    {
        $this->requestUrl                   = Request::url();//."/".urldecode(http_build_query(Input::all()));
        $time = Argon::now();
        $this->dynamicValues['currentTime'] = $time;
        $this->dynamicValues['currentDate'] = $time->format('Y-m-d',$time);
        $this->dynamicValues['ip']          = $this->getRealIpAddr();
    }

    /**
     * Requesting user
     * @param $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Requested api
     * @param Api $api
     * @return $this
     */
    public function setApi(Api $api)
    {
        $this->api = $api;
        return $this;
    }

    public function setContext($component)
    {
        $this->context = $component;
        return $this;
    }

    public function setRequestData($data)
    {
        $this->requestData = $data;
        return $this;
    }

    /**
     * Response data
     * @param $data
     * @return $this
     */
    public function setResponseData($data)
    {
        $this->apiData = $data;
        return $this;
    }

    public function setDynamicValue($requestName, $value)
    {
        $this->dynamicValues[$requestName] = $value;
        return $this;
    }

    public function failResponse($arr, $code)
    {
        $this->headCode = $code;
        $this->setTotal($arr);

        return Response::json($arr, $code)->header('Access-Control-Allow-Origin', "*");
    }

    public function successResponse($arr, $code)
    {
        $this->headCode = $code;
        $this->setTotal();

        return Response::json($arr, $code)->header('Access-Control-Allow-Origin', "*");
    }

    public function runApi($restID, $userID, $clientID, $token = null)
    {

        $api   = Api::find($restID);

        if(empty($api->id))
        {
            return $this->failResponse(['success'=>false, 'code' => '404', 'message' => 'Not Found'], 404);
        }

        $user = $this->getApiUser($userID, $clientID);

        if(empty($user->id))
        {
            return $this->failResponse(['success'=>false, 'code' => '400', 'message' => 'Bad Request'], 400);
        }

        $parameters = $api->config_data['request_type'] == "get" ? Input::all() : post();

        if(empty($parameters['token']))
        {
            $parameters['token'] = $token;
        }

        $this
            ->setUser($user)
            ->setApi($api)
            ->setRequestData($parameters);

        return $this->apiRequestProcess();
    }

    public function apiRequestProcess()
    {

        $this->request_body                 = $this->requestData; //for api counter insert
        $this->request_body['ip_adress']    = $this->getRealIpAddr();

        if(class_exists($this->api->primary_model))
        {
            $this->targetModel      = new $this->api->primary_model;
        }
        else
        {
            return $this->failResponse(['success'=>false, 'code' => '404', 'message' => 'Model not fount'], 404);
        }

        if(intval($this->user->daily_request_limit) > 0)
        {
            if($this->requestCounter() > $this->user->daily_request_limit)
            {
                return $this->failResponse(['success'=>false, 'code' => '402', 'message' => 'Daily request limit'], 402);
            }
        }

        if($this->api->ispublic != 1)
        {
            try
            {
                $verifyToken = $this->verifyToken($this->user->secret_key, $this->requestData);
            }
            catch (\Exception $e)
            {
                return $this->failResponse(['success' => false, 'code' => '401', 'message' => $e->getMessage()], 401);
            }
            if(!$verifyToken)
            {
                return $this->failResponse(['success' => false, 'code' => '401', 'message' => 'Unauthorized'], 401);
            }

            if(!$this->verifyIp($this->user))
            {
                return $this->failResponse(['success' => false, 'code' => '403', 'message' => 'Forbidden'], 403);
            }
        }

        $jsonAble   = [];
        try
        {
            $jsonAble   = Models::instance()->getModelJsonable($this->targetModel);
        }
        catch (\Exception $e){}

        $this->targetModelJsonableFields = $jsonAble;

        try
        {
            $this->targetModelPrimary = Models::instance()->getKeyName($this->targetModel);
        }
        catch (\Exception $e)
        {
            $this->targetModelPrimary = "id";
        }

        //@Todo 2.0 guncellmesinde bu satiri duzenle
        $process = !empty($this->api->config_data['process']) ? $this->api->config_data['process'] : $this->api->config_data['proces'];


        if(!empty($this->api->config_data['specialBeforeEvents']))
        {
            $this->externalSpecialEvents['before'] = array_map('trim', explode(',', $this->api->config_data['specialBeforeEvents']));
        }

        if(!empty($this->api->config_data['specialAfterEvents']))
        {
            $this->externalSpecialEvents['after'] = array_map('trim', explode(',', $this->api->config_data['specialAfterEvents']));
        }

        if($process == "set")
        {
            return $this->apiSetProcess();
        }
        if($process == "del")
        {
            return $this->apiDelProcess();
        }

        return $this->apiGetProcess();

    }

    protected function apiDelProcess()
    {
        $whereFields        = empty($this->api->config_data['equalization']) ? null : $this->api->config_data['equalization'];
        $whereOperators     = empty($this->api->config_data['equalizationOperator']) ? null : $this->api->config_data['equalizationOperator'];
        $activeFields       = $this->api->displayed_fields['active'];
        $requiredValues     = empty($this->api->config_data['required']) ? [] : $this->api->config_data['required'];


        if(!empty($requiredValues))
        {
            foreach ($requiredValues as $dbName=>$intBool)
            {
                if($intBool)
                {
                    $requestName = $this->getFieldName($dbName);
                    if(empty($this->requestData[$requestName]))
                    {
                        return $this->failResponse(['success' => false, 'code' => '406', 'message' => $requestName. ' - is required'], 406);
                    }
                }
            }
        }

        Event::fire('mavitm.restful.beforeDel', [$this, &$this->requestData]);
        $this->referenceEvent("before", $this->requestData);

        $query = $this->targetModel->Query();

        $conditions = false;

        if($whereFields)
        {
            foreach ($whereFields as $index=>$field)
            {

                if(!array_key_exists($index, $activeFields))
                {
                    continue;
                }

                $filedValue = $this->getValue(':'.$field);
                if(!is_numeric($filedValue) && empty($filedValue))
                {
                    continue;
                }

                if(empty(Models::instance()->whereOperators[$whereOperators[$index]]))
                {
                    continue;
                }

                $query->where(
                    $field,
                    Models::instance()->whereOperators[$whereOperators[$index]],
                    $filedValue
                );

                $conditions = true;
            }
        }

        if(!$conditions)
        {
            return $this->failResponse(['success' => false, 'code' => '406', 'message' => 'empty active fields or empty request'], 406);
        }

        $this->apiData = $query->get();

        if(!count($this->apiData))
        {
            return $this->failResponse(['success' => false, 'code' => '410', 'message' => 'no record or records to process'], 410);
        }

        $deleted = $query->delete();

        if(!$deleted)
        {
            return $this->failResponse(['success' => false, 'code' => '417', 'message' => 'transaction failed.'], 417);
        }

        Event::fire('mavitm.restful.afterDel', [$this, $this->apiData]);
        $this->dataEvent("after", $this->apiData);

        return $this->successResponse(['success'=>true, 'code' => '200', 'message' => 'OK', 'data' => ['affectedRows' => $deleted]], 200);
    }

    protected function apiSetProcess()
    {
        if(!empty($this->requestData[$this->targetModelPrimary]))
        {
            $this->targetModel = $this->targetModel->find($this->requestData[$this->targetModelPrimary]);
            if(empty($this->targetModel->{$this->targetModelPrimary}))
            {
                return $this->failResponse(['success'=>false, 'code' => '410', 'message' => 'Gone'], 410);
            }
        }
        elseif($this->api->config_data['set_type'] == "patch")
        {
            return $this->failResponse(['success'=>false, 'code' => '412', 'message' => 'You can only send update request'], 412);
        }

        $requestIndex           = $this->api->config_data['requestindex'];
        $defaultValues          = empty($this->api->config_data['defaultvalue']) ? [] : $this->api->config_data['defaultvalue'];
        $requiredValues         = empty($this->api->config_data['required']) ? [] : $this->api->config_data['required'];
        $activeFields           = $this->api->displayed_fields['active'];

        if(!empty($requiredValues))
        {
            foreach ($requiredValues as $dbName=>$intBool)
            {
                if($intBool)
                {

                    $requestName = $requestIndex[$dbName];

                    if(empty($this->requestData[$requestName]))
                    {
                        return $this->failResponse(['success' => false, 'code' => '406', 'message' => $requestName. ' - is required'], 406);
                    }
                }
            }
        }

        Event::fire('mavitm.restful.beforeSet', [$this, &$this->requestData]);
        $this->referenceEvent("before", $this->requestData);

        $send_request_back = [];
        $setFields = false;
        foreach ($requestIndex as $dbName=>$inputName)
        {
            $inputName = trim($inputName);
            if(empty($inputName))
            {
                continue;
            }

            if(!array_key_exists($dbName, $activeFields))
            {
                continue;
            }

            $dbFieldName = $this->getFieldName($dbName);//@end(explode('.',$dbName));

            if(isset($this->requestData[$inputName]))
            {

                $filedValue = $this->requestData[$inputName];

                if(
                    is_array($this->targetModelJsonableFields) &&
                    in_array($dbFieldName, $this->targetModelJsonableFields) &&
                    is_scalar($this->requestData[$inputName])
                )
                {
                    try
                    {
                        $filedValue = json_decode($this->requestData[$inputName], true);
                    }
                    catch (\Exception $e)
                    {}
                }

                $this->targetModel->$dbFieldName = $filedValue;
                $send_request_back[$dbFieldName] = $filedValue;
                $setFields = true;
            }
        }

        if(!empty($defaultValues) && is_array($defaultValues))
        {
            foreach ($defaultValues as $dbName=>$value)
            {
                $dbFieldName = $this->getFieldName($dbName);
                if(trim($value))
                {
                    $value                              = $this->getDefaultValue($dbFieldName, $value);
                    $this->targetModel->$dbFieldName    = $value;
                    $send_request_back[$dbFieldName]    = $value;
                    $setFields = true;
                }
            }
        }

        if(!$setFields)
        {
            return $this->failResponse(['success' => false, 'code' => '403', 'message' => 'There was no demand for active areas or there was no active area marked'], 403);
        }

        try
        {
            $this->targetModel->save();
        }
        catch (\Exception $e)
        {
            return $this->failResponse(['success' => false, 'code' => '401', 'message' => $e->getMessage().' from model validation'], 401);
        }

        Event::fire('mavitm.restful.afterSet', [$this, $this->targetModel]);
        $this->dataEvent("after", $this->targetModel);

        $replyType = empty($this->api->config_data['return_data_type']) ? null : $this->api->config_data['return_data_type'];

        if($replyType == "process_result")
        {
            return $this->successResponse([
                'success'=>true,
                'code' => '200',
                'message' => 'OK',
                'data'=>['id' => $this->targetModel->{$this->targetModelPrimary}]
            ], 200);
        }
        elseif($replyType == "send_request_back")
        {
            return $this->successResponse([
                'success'=>true,
                'code' => '200',
                'message' => 'OK',
                'data' => $send_request_back
            ], 200);
        }
        else
        {
            $data = $this->targetModel->find($this->targetModel->{$this->targetModelPrimary});
            return $this->successResponse([
                'success'=>true,
                'code' => '200',
                'message' => 'OK',
                'data'=>$data
            ], 200);
        }
    }

    public function apiGetProcess()
    {
        $whereFields        = empty($this->api->config_data['equalization']) ? null : $this->api->config_data['equalization'];
        $whereOperators     = empty($this->api->config_data['equalizationOperator']) ? null : $this->api->config_data['equalizationOperator'];
        $whereValues        = empty($this->api->config_data['equalizationValue']) ? null : $this->api->config_data['equalizationValue'];
        $activeRelations    = empty($this->api->config_data['activeRelation']) ? null : $this->api->config_data['activeRelation'];
        $activeFields       = $this->api->displayed_fields['active'];


        Event::fire('mavitm.restful.beforeGet', [$this, &$this->requestData]);
        $this->referenceEvent("before", $this->requestData);

        $query = $this->targetModel->Query();

        if($whereFields)
        {
            foreach ($whereFields as $index=>$field)
            {
                $filedValue = $this->getValue($whereValues[$index]);
                if(!is_numeric($filedValue) && empty($filedValue))
                {
                    continue;
                }

                $query->where(
                    $field,
                    Models::instance()->whereOperators[$whereOperators[$index]],
                    $filedValue
                );

            }
        }

        if(!empty($this->api->config_data['orderByActive']))
        {
            $query->orderBy($this->api->config_data['orderByField'], $this->api->config_data['orderByAlignment']);
        }

        if(!empty($this->api->config_data['limit']))
        {
            if(!empty($this->api->config_data['allowRequestSkip']) && !empty($this->requestData['paginate']) && is_numeric($this->requestData['paginate']))
            {
                $query->skip($this->api->config_data['limit'] * $this->requestData['paginate']);
            }
            elseif(!empty($this->api->config_data['skip']) && is_numeric($this->api->config_data['skip']))
            {
                $query->skip($this->api->config_data['skip']);
            }

            $query->take($this->api->config_data['limit']);
        }

        $this->apiData = $query->get();

        $returnData = [];
        $x = 0;

        foreach ($this->apiData as $collection)
        {
            if(empty($activeFields))
            {
                $returnData[$x] = $collection->toArray();
            }
            else
            {
                foreach ($activeFields as $dbName=>$f)
                {
                    $returnData[$x][$f] = $collection->$f;
                }
            }

            if(!empty($activeRelations))
            {
                foreach ($activeRelations as $relation)
                {
                    $returnData[$x][$relation] = $this->relationPrepare($collection, $relation);
                }
            }

            $x++;
        }

        Event::fire('mavitm.restful.afterGet', [$this, &$returnData]);
        $this->referenceEvent("after", $returnData);

        return $this->successResponse(['success'=>true, 'code' => '200', 'message' => 'OK', 'data' => $returnData], 200);
    }

    private function relationPrepare($collection, $relationName)
    {
        $fields = $this->api->displayed_fields[$relationName];

        if(empty($fields))
        {
            return [];
        }

        $relationType       = $this->api->config_data['modelType'][$relationName];

        $isSingularPlural   = Models::instance()->relationTypes[$relationType];

        $returnData = [];

        if($isSingularPlural == "singular")
        {

            $subCollection = $collection->$relationName;

            foreach ($fields as $f)
            {
                if(method_exists($subCollection, $f))
                {
                    $returnData[$f] = $subCollection->$f();
                }
                else
                {
                    @$returnData[$f] = $subCollection->$f;
                }
            }
        }
        else
        {
            $x = 0;
            foreach ($collection->$relationName as $prop)
            {
                foreach ($fields as $f)
                {
                    if(method_exists($prop,$f))
                    {
                        $returnData[$x][$f] = $prop->$f();
                    }
                    else
                    {
                        $returnData[$x][$f] = $prop->$f;
                    }
                }
                $x++;
            }
        }

        return $returnData;
    }

    public function verifyIp($user)
    {
        $userIPS = explode(',', $user->allowed_ip);
        if(!in_array($this->getRealIpAddr(), $userIPS))
        {
            if(!in_array("0.0.0.0", $userIPS))
            {
                return false;
            }
        }

        return true;
    }

    public function verifyToken($userSecret, $parameters, $inputToken = null)
    {
        if(!$inputToken)
        {
            if(empty($parameters['token']))
            {
                throw new ApplicationException(Translate::getTranslate("Token required"));
            }

            $inputToken = $parameters['token'];
        }

        $selfToken = Signature::instance()->getSign($userSecret, $parameters);

        return $inputToken == $selfToken ? true : false;
    }

    /**
     * user daily request count
     * @return integer
     */
    public function requestCounter()
    {
        return Counter::where("user_id","=", $this->user->id)
            ->where("head_code","=",200)
            ->whereDay('created_at','=',  date('d'))
            ->count();
    }

    public function getApiUser($userID, $clientID)
    {
        return User::where("id", "=", $userID)
            ->where("cilent_id", "=", $clientID)
            ->first();
    }

    public function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //Proxy IP.
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    protected function setTotal($errData = false)
    {
        if(empty($this->user->id))
        {
            return false;
        }

        $total = new Counter();

        $total->user_id     = $this->user->id;
        $total->api_id      = $this->api->id;

        $total->id_address   = $this->requestUrl;
        if($errData)
        {
            if(!is_array($errData))
            {
                $errData = [$errData];
            }
            $total->request_body = array_merge($this->request_body, ['response'=>$errData]);
        }
        else
        {
            $total->request_body = $this->request_body;
        }

        $process = !empty($this->api->config_data['process']) ? $this->api->config_data['process'] : $this->api->config_data['proces'];

        if($process == "set")
        {
            $total->total_row = 1;
        }
        else
        {
            if($this->apiData)
            {
                $total->total_row   = count($this->apiData);
            }
        }

        $total->head_code = $this->headCode;

        if(!empty($this->contentID))
        {
            $total->content_id = $this->contentID;
        }

        if(!empty($this->contentType))
        {
            $total->content_type = $this->contentType;
        }


        $total->save();
    }

    /**
     * get value for Equalization
     * @param $equalizationValue
     * @return bool|mixed|string
     */
    private function getValue($equalizationValue, $inRequest = true)
    {
        if($this->context)
        {
            $proberties = $this->context->getProperties();
        }

        $startWith      = substr(trim($equalizationValue),0,1);

        if($startWith == ":")
        {
            $str = substr($equalizationValue, 1);

            if(!empty($this->dynamicValues[$str]))
            {
                return $this->dynamicValues[$str];
            }
            elseif(!empty($this->requestData[$str]) && $inRequest)
            {
                return $this->requestData[$str];
            }
            elseif(!empty($proberties[$str]))
            {
                return $proberties[$str];
            }
            else
            {
                return $equalizationValue;
            }
        }
        elseif($startWith == "\\")
        {
            return substr($equalizationValue, 1);
        }

        return $equalizationValue;
    }

    private function getDefaultValue($field, $values)
    {
        $getValues = $values;
        $startWith      = substr(trim($getValues),0,1);

        if(
            !empty($this->targetModelJsonableFields) &&
            is_array($this->targetModelJsonableFields) &&
            in_array($field, $this->targetModelJsonableFields)
        )
        {
            try
            {
                $getValues = json_decode($values);
            }
            catch (\Exception $e){}
        }
        elseif($startWith == ":")
        {
            $getValues = $this->getValue($getValues, false);
        }

        return $getValues;
    }

    protected function getFieldName($dbName)
    {
        return @end(explode('.',$dbName));
    }

    protected function referenceEvent($type, &$data)
    {
        if(!empty($this->externalSpecialEvents[$type]) && is_array($this->externalSpecialEvents[$type]))
        {
            foreach ($this->externalSpecialEvents[$type] as $eventName)
            {
                Event::fire($eventName, [$this, &$data]);
            }
        }
    }

    protected function dataEvent($type, $data)
    {
        if(!empty($this->externalSpecialEvents[$type]) && is_array($this->externalSpecialEvents[$type]))
        {
            foreach ($this->externalSpecialEvents[$type] as $eventName)
            {
                Event::fire($eventName, [$this, $data]);
            }
        }
    }

}