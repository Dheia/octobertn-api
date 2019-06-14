<?php namespace Toannang\Componentbuilder\Components;

use Cms\Classes\ComponentBase;
use RainLab\Translate\Classes\Translator;
use toannang\Settings\Models\Settings;

class LeptHpcosmeticsHeader extends ComponentBase
{
    public $translator;
    public function componentDetails()
    {
        return [
            'name'        => 'LeptHpcosmeticsHeader Component',
            'description' => 'LeptHpcosmeticsHeader Component object the first'
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
        $this->addCss('components/lepthpcosmeticsheader/assets/style.css');
        $this->addJs('components/lepthpcosmeticsheader/assets/script.js');
        $this->page['logo'] = Settings::getLogo();
        $this->page['site_name']  = Settings::get('site_name');
    }
}
