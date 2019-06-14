<?php namespace Toannang\Componentbuilder\Components;

use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Post;
use RainLab\Translate\Classes\Translator;
use toannang\Settings\Models\Settings;

class LamRevolutionClothingFooter extends ComponentBase
{
    public $translator;
    public function componentDetails()
    {
        return [
            'name'        => 'Revolution Clothing Footer',
            'description' => 'Mẫu Footer của Revolution Clothing'
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

    /**
     * Đã gọi menu trong default.htm
     * Gồm 3 menu: Thông tin, tài khoản và dịch vụ
     * Vui lòng tạo 3 menu trong Page đúng tên [code] như đã khai báo bên dưới
     *
     */
    public function onRun()
    {
        $settings = Settings::instance();
        $currentLang = $this->translator->getLocale();

        $this->addCss('components/lamrevolutionclothingfooter/assets/style.css');

        $this->addComponent('RainLab\Pages\Components\StaticMenu', 'thongtinMenu',['code' => $currentLang == 'en' ? 'information':'thong-tin']);
        $this->addComponent('RainLab\Pages\Components\StaticMenu', 'taikhoanMenu',['code' => $currentLang == 'en' ? 'account':'tai-khoan']);
        $this->addComponent('RainLab\Pages\Components\StaticMenu', 'dichvuMenu',['code' => $currentLang == 'en' ? 'services':'dich-vu']);
        $this->page['address'] = $settings->lang($currentLang)->address;
        $this->page['hotline'] = $settings->get('hotline');
        $this->page['phone'] = $settings->get('phone');
        $this->page['email'] = $settings->get('email');
        $this->page['copyright'] = $settings->lang($currentLang)->copyright;
        $this->page['socials'] = $settings->get('socials');
    }
}
