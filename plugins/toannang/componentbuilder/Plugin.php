<?php namespace Toannang\ComponentBuilder;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return[
            'toannang\componentbuilder\Components\LeptHpcosmeticsHeader' => 'LeptHpcosmeticsHeader',
            'toannang\componentbuilder\Components\LamRevolutionClothingHeader' => 'LamRevolutionClothingHeader',
            'toannang\componentbuilder\Components\LamRevolutionClothingFooter' => 'LamRevolutionClothingFooter',
            'toannang\componentbuilder\Components\LamRevolutionClothingSlider' => 'LamRevolutionClothingSlider'
        ];
    }

    public function registerSettings()
    {
    }
}
