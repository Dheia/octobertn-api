<?php 
class Cms5cf9cdf06deec712614455_5e30d5499d92a488d9155e235a0720c6Class extends Cms\Classes\PartialCode
{
public function onStart(){
    $this['favicon'] = \toannang\Settings\Models\Settings::getFavicon();
}
}
