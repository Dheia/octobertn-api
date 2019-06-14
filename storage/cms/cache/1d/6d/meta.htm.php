<?php 
class Cms5cf8dd4740bae786599709_27b6841bc85f7be21df953ef00c2b8e2Class extends Cms\Classes\PartialCode
{
public function onStart(){
    $this['favicon'] = \toannang\Settings\Models\Settings::getFavicon();
}
}
