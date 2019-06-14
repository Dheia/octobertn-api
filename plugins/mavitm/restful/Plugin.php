<?php namespace Mavitm\Restful;

use Yaml;
use File;
use System\Classes\PluginBase;
use RainLab\User\Models\User as UserModel;
use RainLab\User\Controllers\Users as UsersController;

use RainLab\User\Classes\UserEventBase;

class Plugin extends PluginBase
{

    public $require = ['RainLab.User', 'RainLab.Builder', 'Rainlab.Translate'];

    public function registerComponents()
    {
        return [
            'Mavitm\Restful\Components\Restapi' => 'restapi'
        ];
    }

    public function registerSettings()
    {

    }

    public function boot()
    {

        UserModel::extend(function($model) {
            $model->addFillable([
                'cilent_id',
                'secret_key',
                'daily_request_limit',
                'allowed_ip'
            ]);
        });

        UsersController::extendFormFields(function($widget) {
            if (!$widget->model instanceof UserModel) {
                return;
            }
            $configFile = plugins_path('mavitm/restful/config/userField.yaml');
            $config = Yaml::parse(File::get($configFile));
            $widget->addTabFields($config);
        });

        ### EXAMPLE 
        /*
        Event::listen('mavitm.restful.beforeSet', function ($restfulClass, &$requestArray){
            \Log::debug("run mavitm.restful.beforeSet");
        });
        Event::listen('mavitm.restful.afterSet', function ($restfulClass, $targetModel){
            \Log::debug("run mavitm.restful.afterSet");
        });
        Event::listen('mavitm.restful.beforeGet', function ($restfulClass, &$requestArray){
            \Log::debug("run mavitm.restful.beforeGet");
        });
        Event::listen('mavitm.restful.afterGet', function ($restfulClass, &$responseData){
            \Log::debug("run mavitm.restful.afterGet");
        });
        //Special before event names (optional)
        Event::listen('mavitm.test.event', function ($class, $data){
            \Log::debug("run mavitm.test.event");
        });    
        */
    }

}