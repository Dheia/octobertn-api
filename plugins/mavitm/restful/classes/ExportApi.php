<?php
/**
 * Created by PhpStorm.
 * User: ayhan
 * Date: 07.11.2018
 * Time: 12:40
 */

namespace Mavitm\Restful\Classes;

use Mavitm\Restful\Models\Api;

class ExportApi
{
    public $exportData = [];

    public function exportApiIDs(Array $ids)
    {
        $apis = Api::whereIn("id", $ids)->get();
        $x = 0;
        foreach ($apis as $api)
        {
            $processType = !empty($api->config_data['process']) ? $api->config_data['process'] : $api->config_data['proces'];

            $this->exportData[$x]['name'] = $api->name;
            $this->exportData[$x]['request'] = $processType;
            $this->exportData[$x]['ispublick'] = $api->ispublick == 1 ? 'yes':'no';
            if(!empty($api->config_data['set_type']))
            {
                $this->exportData[$x]['set_type'] = $api->config_data['set_type'];
            }

            if($processType == 'get')
            {
                $this->exportData[$x]['parameters']     = $this->prepareGetApiValues($api);
                $this->exportData[$x]['response']       = $this->prepareGetResponseValues($api);
            }
            else
            {
                $this->exportData[$x]['parameters']     = $this->prepareSetApiValues($api);
            }
            $x++;
        }

        return $this->exportData;
    }

    public function prepareGetApiValues(Api $api)
    {
        $where = empty($api->config_data['equalization']) ? null : $api->config_data['equalization'];
        $equalizationPostName = empty($api->config_data['equalizationValue']) ? []:$api->config_data['equalizationValue'];
        $equalizationOperator = empty($api->config_data['equalizationOperator']) ? []:$api->config_data['equalizationOperator'];

        $parameters = [
            'userid' => [
                'required' => true,
                'type' => 'number',
                'description' => 'Your user id',
            ],
            'clientID' => [
                'required' => true,
                'type' => 'string',
                'description' => 'Your cliend id',
            ],
            'token' => [
                'required' => true,
                'type' => 'string',
                'description' => 'signature created for all requests',
            ]
        ];

        if($api->ispublic == 1 )
        {
            $parameters['token']['required'] = false;
        }

        if($where)
        {
            foreach ($where as $tablePath=>$field)
            {
                if(!empty($equalizationPostName[$tablePath]))
                {
                    $parameters[$equalizationPostName[$tablePath]] = [
                        'required' => true,
                        'type' => 'mixin',
                        'operator' => Models::instance()->whereOperators[$equalizationOperator[$tablePath]],
                        'description' => 'your request item',
                    ];
                }
            }
        }

        return $parameters;
    }

    public function prepareGetResponseValues(Api $api)
    {
        $response = [];

        $activeFields = empty($api->displayed_fields['active']) ? null : $api->displayed_fields['active'];
        if($activeFields)
        {
            $response = array_values($activeFields);
        }

        if(count($api->displayed_fields) > 1)
        {
            $arr = $api->displayed_fields;
            unset($arr['active']);
            foreach ($arr as $relationName=>$fields)
            {
                $response[$relationName] = $fields;
            }
        }
        return $response;
    }

    public function prepareSetApiValues(Api $api)
    {
        $activeFields  = empty($api->displayed_fields['active']) ? null : $api->displayed_fields['active'];
        $postIndexName = empty($api->config_data['requestindex']) ? null : $api->config_data['requestindex'];
        $defaultvalue  = empty($api->config_data['defaultvalue']) ? null : $api->config_data['defaultvalue'];

        $parameters = [
            'userid' => [
                'required' => true,
                'type' => 'number',
                'description' => 'Your user id',
            ],
            'clientID' => [
                'required' => true,
                'type' => 'string',
                'description' => 'Your cliend id',
            ],
            'token' => [
                'required' => true,
                'type' => 'string',
                'description' => 'signature created for all requests',
            ]
        ];

        if($api->ispublic == 1 )
        {
            $parameters['token']['required'] = false;
        }

        if($activeFields)
        {
            foreach ($activeFields as $tablePath=>$field)
            {
                if(empty($defaultvalue[$tablePath]))
                {
                    $parameters[$postIndexName[$tablePath]] = [
                        'required' => true,
                        'type' => 'mixin',
                        'description' => 'your request item',
                    ];
                }
            }
        }

        //$parameters = $activeFields;

        return $parameters;

    }

}