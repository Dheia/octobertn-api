<?php namespace Toannang\Settings;

use System\Classes\PluginBase;
use toannang\Settings\Models\Settings;
use Event;
class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Cài đặt website',
                'description' => 'Mục cài đặt tổng quan của website',
                'category'    => 'Cài đặt chung',
                'icon'        => 'icon-globe',
                'class'       => 'toannang\settings\Models\Settings',
                'order'       => 0,
                'keywords'    => 'settings, general, cài đặt chung',
                'permissions' => ['toannang.settings.access_settings']
            ]
        ];
    }

}
