<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/6/2019
 * Time: 10:45
 */

namespace toannang\Settings\Models;
use Model;
use Config;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];
    public $translatable = [];
    public $settingsCode = 'toannang_settings_settings';

    public $settingsFields = 'fields.yaml';

    public $rules = [
    ];
    public static function boot()
    {

        // Call default functionality (required)
        parent::boot();

        // Check the translate plugin is installed
        if (!class_exists('RainLab\Translate\Behaviors\TranslatableModel')) {
            return;
        }

        // Extend the constructor of the model
        self::extend(
            function ($model) {

                // Implement the translatable behavior
                $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel';
                $model->translatable = ['site_name', 'address','copyright'];
            }
        );
    }

    static public function getLogo(){
        return url(Config::get('cms.storage.media.path').self::get('logo_image'));
    }
    static public function getFavicon(){
        return url(Config::get('cms.storage.media.path').self::get('favicon_image'));
    }



}