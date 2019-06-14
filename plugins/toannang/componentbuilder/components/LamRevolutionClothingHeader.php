<?php namespace Toannang\Componentbuilder\Components;

use Cms\Classes\ComponentBase;
use RainLab\Translate\Classes\Translator;
use toannang\Settings\Models\Settings;

class LamRevolutionClothingHeader extends ComponentBase
{
    public $translator;
    public function componentDetails()
    {
        return [
            'name'        => 'Lam RevolutionClothing Header',
            'description' => 'Header Revolution Clothing'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function init()
    {
        $this->translator = Translator::instance();
    }
    public function onRun()
    {
        $currentLang = $this->translator->getLocale();
        $this->addComponent('RainLab\Pages\Components\StaticMenu', 'mainMenu',['code' => $currentLang == 'en' ? 'main-menu-en':'main-menu']);

        $this->addCss('components/lamrevolutionclothingheader/assets/style.css');
        $this->page['logo'] = Settings::getLogo();
        $this->page['site_name']  = Settings::get('site_name');
    }

}
