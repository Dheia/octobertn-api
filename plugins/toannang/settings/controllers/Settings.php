<?php namespace Toannang\Settings\Controllers;

use BackendMenu;
use System\Classes\SettingsManager;
class Settings extends \Backend\Classes\Controller
{
    public $implement = [    ];
    
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('toannang.settings', 'settings');
    }
}
