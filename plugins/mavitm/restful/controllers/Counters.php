<?php namespace Mavitm\Restful\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Counters extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController','Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Mavitm.Restful', 'restful-menu-item', 'restful-counter-item');
    }
}
