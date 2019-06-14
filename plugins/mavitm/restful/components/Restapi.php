<?php namespace Mavitm\Restful\Components;

use Log;
use Input;
use Event;
use Request;
use Response;
use RainLab\User\Models\User;
use Cms\Classes\ComponentBase;
use Mavitm\Restful\Models\Api;
use Mavitm\Restful\Classes\Restful;

class Restapi extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'mavitm.restful::lang.components.restapicomponent',
            'description' => ''
        ];
    }

    public function defineProperties()
    {
        return [
            'restID' => [
                'title'       => 'mavitm.restful::lang.components.selectApi',
                'type'        => 'dropdown',
                'options'     => Api::get()->lists("name","id")
            ],
            'userID' => [
                'title'       => 'mavitm.restful::lang.components.userID',
                'default'     => '{{ :user }}',
                'type'        => 'string'
            ],
            'cilentID' => [
                'title'       => 'mavitm.restful::lang.components.cilentID',
                'description' => '',
                'default'     => '{{ :id }}',
                'type'        => 'string'
            ],
            'token' => [
                'title'       => 'mavitm.restful::lang.components.token',
                'description' => '',
                'default'     => '{{ :token }}',
                'type'        => 'string'
            ],
        ];
    }

    private function prepareValues()
    {

    }

    /**
     * ajax request construct
     */
    public function init()
    {
        parent::init();
        $this->prepareValues();
    }

    public function onRun()
    {
        $this->prepareValues();

        $userID         = $this->property('userID');
        $restID         = $this->property('restID');
        $clientID       = $this->property('cilentID');
        $token          = $this->property('token');

        $restFulClass   = new Restful();
        $restFulClass->setContext($this);

        return $restFulClass->runApi($restID, $userID, $clientID, $token);
    }

}
