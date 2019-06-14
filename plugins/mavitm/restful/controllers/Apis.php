<?php namespace Mavitm\Restful\Controllers;

use Illuminate\Support\Facades\Input;
use Log;
use Flash;
use Mavitm\Restful\Classes\ExportApi;
use Request;
use Backend;
use October\Rain\Database\ModelException;
use October\Rain\Exception\ApplicationException;
use Storage;
use Redirect;
use BackendMenu;
use Backend\Classes\Controller;
use Mavitm\Restful\Models\Api;
use Mavitm\Restful\Classes\Models;

class Apis extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController'
    ];

    public $listConfig      = 'config_list.yaml';
    public $formConfig      = 'config_form.yaml';
    public $relationConfig  = 'config_relation.yaml';

    public $requiredPermissions = [
        'resful_view' 
    ];

    public $procesTypePartials = [
        "set" => "proces-type-set",
        "get" => "proces-type-get",
        "del" => "proces-type-del",
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Mavitm.Restful', 'restful-menu-item');
    }

    public function create()
    {
        $this->prepareFormValues();
        $this->asExtension('FormController')->create();
    }

    public function update($recordId)
    {
        $this->prepareFormValues();

        $model = $this->formFindModelObject($recordId);

        $this->vars['updateForm'] = $model->toArray();

        $this->onModelSelect($this->vars['updateForm']);
        $this->onModelProperties($this->vars['updateForm']);
        $this->onModelRelations($this->vars['updateForm']);

        $this->vars['activeFields']      = [];
        if(!empty($this->vars['updateForm']['displayed_fields']['active']))
        {
            $this->vars['activeFields']         = $this->vars['updateForm']['displayed_fields']['active'];
        }

        $this->vars['displayed_fields']      = [];
        if(!empty($this->vars['updateForm']['displayed_fields']))
        {
            $this->vars['displayed_fields']     = $this->vars['updateForm']['displayed_fields'];
        }

        $this->vars['equalizationValue']      = [];
        if(!empty($this->vars['updateForm']['config_data']['equalizationValue']))
        {
            $this->vars['equalizationValue']    = $this->vars['updateForm']['config_data']['equalizationValue'];
        }

        $this->vars['equalizationOperator']      = [];
        if(!empty($this->vars['updateForm']['config_data']['equalizationOperator']))
        {
            $this->vars['equalizationOperator'] = $this->vars['updateForm']['config_data']['equalizationOperator'];
        }

        $this->vars['relationsActive']      = false;
        if(!empty($this->vars['updateForm']['config_data']['relation']))
        {
            $this->vars['relationsActive']      = $this->vars['updateForm']['config_data']['relation'];
        }

        $this->vars['equalization']         = [];
        if(!empty($this->vars['updateForm']['config_data']['equalization']))
        {
            $this->vars['equalization']         = $this->vars['updateForm']['config_data']['equalization'];
        }

        $this->vars['activeRelation']       = [];
        if(!empty($this->vars['updateForm']['config_data']['activeRelation']))
        {
            $this->vars['activeRelation']         = $this->vars['updateForm']['config_data']['activeRelation'];
        }

        $this->vars['requestindex']       = [];
        if(!empty($this->vars['updateForm']['config_data']['requestindex']))
        {
            $this->vars['requestindex']         = $this->vars['updateForm']['config_data']['requestindex'];
        }

        $this->vars['defaultvalue']       = [];
        if(!empty($this->vars['updateForm']['config_data']['defaultvalue']))
        {
            $this->vars['defaultvalue']         = $this->vars['updateForm']['config_data']['defaultvalue'];
        }

        $this->vars['required']       = [];
        if(!empty($this->vars['updateForm']['config_data']['required']))
        {
            $this->vars['required']         = $this->vars['updateForm']['config_data']['required'];
        }

        $this->asExtension('FormController')->update($recordId);
    }

    public function onSave2()
    {
        $this->vars['post'] = $post = post();

        if(empty($post['selectfields']))
        {
            Flash::error(e(trans('mavitm.restful::lang.backendError.notActiveSelection')));
            return false;
        }

        if(!empty($post['id']))
        {
            $api = Api::find($post['id']);
        }
        else
        {
            $api = new Api();
        }

        $api->name              = $post['name'];
        $api->primary_model     = $post['primary_model'];
        $api->config_data       = $post['config_data'];
        $api->displayed_fields  = $post['selectfields'];
        $api->ispublic          = $post['Api']['ispublic'];

        $api->save();

        Flash::success(e(trans('mavitm.restful::lang.backendSysMsg.successFully')));

        if ($redirect = $this->makeRedirect('update', $api)) {
            return $redirect;
        }
    }


    protected function prepareFormValues()
    {
        $this->addCss('/plugins/mavitm/restful/assets/css/backend_form.css');
        $this->addJs('/plugins/mavitm/restful/assets/js/backend_form.js');

        $this->vars['arearandstr']          = 'area'.rand(1000,9999);

        if(empty($this->vars['updateForm']))
        {
            $this->vars['updateForm']           = [];
            $this->vars['activeFields']         = [];
            $this->vars['equalizationOperator'] = [];
            $this->vars['equalizationValue']    = [];
            $this->vars['equalization']         = [];
            $this->vars['relationsActive']      = false;
            $this->vars['activeRelation']       = [];
            $this->vars['requestindex']         = [];
        }

        $this->vars['models']               = Models::instance()->getModels();
    }

    public function onModelSelect($post = false)
    {

        if(!is_array($post))
        {
            $post = post();
        }

        $this->prepareFormValues();

        $this->vars['modelselect']      = false;
        $this->vars['models']           = Models::instance()->getModels();


        if(!empty($post['config_data']['process']))
        {
            $process = $post['config_data']['process'];
        }
        elseif($post['config_data']['proces']) //@Todo 2.0 surumunde bu satiri duzenle
        {
            $process = $post['config_data']['proces'];
        }

        if(!empty($process))
        {
            $this->vars['modelselect']  = $process;
            $this->vars['partialName']  = $this->procesTypePartials[$process]; //$this->vars['modelselect'] == "get" ? 'proces-type-get' : 'proces-type-set';
        }
    }

    public function onModelProperties($post = false)
    {
        if(!is_array($post))
        {
            $post = post();
        }

        $this->prepareFormValues();

        $this->vars['fields']           = Models::instance()->modelFields($post['primary_model']);
        $this->vars['checkboxrandstr']  = rand(100000,999999);
        $this->vars['arearandstr']      = rand(100000,999999);

        $this->vars['set_type'] = "put";
        if(!empty($this->vars['updateForm']['config_data']['set_type']))
        {
            $this->vars['set_type'] = $this->vars['updateForm']['config_data']['set_type'];
        }

        if(!empty($post['config_data']['proces'])) //@Todo 2.0 surumunde bu satiri duzenle
        {
            $this->vars['modelselect']  = $post['config_data']['proces'];
        }
        elseif(!empty($post['config_data']['process']))
        {
            $this->vars['modelselect']  = $post['config_data']['process'];
        }

    }

    public function onModelRelations($post = false)
    {
        if(!is_array($post))
        {
            $post = post();
        }

        $this->prepareFormValues();

        $this->vars['relationsActive']  = false;
        if(!empty($post['config_data']['relation']))
        {
            $this->vars['relationsActive']  = $post['config_data']['relation'];
        }

        $this->vars['relations']        = Models::instance()->modelRelations($post['primary_model']);
    }

    public function onJsonExport()
    {
        $export = new ExportApi();

        $this->vars['content'] = json_encode($export->exportApiIDs(Input::get("checked")));
        return ['#modalContent'=>$this->makePartial('popup')];
    }

    ##############################################
}
