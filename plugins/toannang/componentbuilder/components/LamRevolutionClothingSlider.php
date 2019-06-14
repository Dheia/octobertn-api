<?php namespace Toannang\Componentbuilder\Components;

use Cms\Classes\ComponentBase;
use Config;
use toannang\Settings\Models\Settings;

class LamRevolutionClothingSlider extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'LamRevolutionClothingSlider Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }
    public function onRun()
    {
        $this->addCss('components/lamrevolutionclothingslider/assets/slick/slick.css');
        $this->addJs('components/lamrevolutionclothingslider/assets/slick/slick.min.js');
        $this->addJs('components/lamrevolutionclothingslider/assets/script.js');
        $slides = Settings::get('home_sliders');
        foreach ($slides as $key => $slide){
            $slides[$key]['image'] = url(Config::get('cms.storage.media.path').$slide['image']);
        }
        $this->page['home_sliders'] = $slides;
    }
}
