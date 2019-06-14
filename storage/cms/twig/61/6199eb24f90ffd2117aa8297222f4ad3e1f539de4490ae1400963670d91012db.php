<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* M:\DATA\octobertn/plugins/toannang/componentbuilder/components/lepthpcosmeticsheader/default.htm */
class __TwigTemplate_4587a4ce7894fd31edcc79a92fae1a66c4c0f617cdf6f8ef1ea332cb05f649bb extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div id=\"mobile-layer-h025\"></div>
<div id=\"sidenav-h025\" class=\"sidenav menu_mobile hidden-md hidden-lg\">
    <div class=\"top_menu_mobile\">
        <span class=\"close-menu\"><i class=\"fa fa-times-rectangle\"></i> </span>
        <div class=\"logo-mobile-menu\">
            <img src=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["logo"] ?? null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, ($context["site_name"] ?? null), "html", null, true);
        echo "\"/>
        </div>
    </div>
    <div class=\"content_memu_mb\">
        ";
        // line 10
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("mainMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 11
        echo "    </div>
</div>
<header id=\"header-h025\">
    <div class=\"header-top\">
        <div class=\"container\">
            <?php if (!empty(\$social)): ?>
            <div class=\"col-lg-2\">
                <ul class=\"top-social\">
                    <li>
                        <a href=\"<?= \$social['facebook'] ?>\" target=\"_blank\" title=\"Facebook\">
                            <img src=\"<?= \$this->getPath() ?>images/facebook.png\"
                                 alt=\"Facebook\">
                        </a>
                    </li>
                    <li>
                        <a href=\"<?= \$social['youtube'] ?>\" target=\"_blank\" title=\"Youtube\">
                            <img src=\"<?= \$this->getPath() ?>images/youtube.png\" alt=\"Youtube\">
                        </a>
                    </li>
                    <li>
                        <a href=\"<?= \$social['google'] ?>\" target=\"_blank\" title=\"Google\">
                            <img src=\"<?= \$this->getPath() ?>images/google-plus.png\"
                                 alt=\"Google\">
                        </a>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
            <div class=\"col-lg-6\"></div>
            <div class=\"col-lg-4\">
                <div class=\"language\">
                    ";
        // line 42
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("lang-switcher"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 43
        echo "                </div>
                <div class=\"hotline\">
                    <ul>
                        <li>
                            <span><?php _e(\"Holine\", \"tn_component\") ?> : </span>
                            <a class=\"holine\"
                               href=\"tel:<?php _e(\$info['hotline']) ?>\"><?php _e(\$info['hotline']) ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class=\"main-header\">
        <div class=\"container\">
            <div class=\"row flex-row\">


                <div class=\"col-lg-4 col-md-4 col-xs-12 cart-mobile\">
                    <div class=\"menu-bar-h nav-mobile-button visible-xs\">
                        <a href=\"#\"><i class=\"fa fa-bars\"></i> </a>
                    </div>
                    <div class=\"search-container\">
                        <form action=\"";
        // line 66
        echo url("search");
        echo "\" method=\"get\">
                            <input type=\"text\" name=\"s\"
                                   placeholder=\"<?= __('Tìm kiếm sản phẩm', 'tn_component') ?>\"
                                   autocomplete=\"off\">
                            <div class=\"select-box\">
                                <select name=\"term_id\" id=\"sel1\">
                                    <option>Tất cả</option>
                                </select>
                                <span class=\"fa fa-angle-down\"></span>
                            </div>
                            <button type=\"submit\" class=\"btn-send\"><span class=\"fa fa-search\"></span>
                            </button>
                        </form>
                    </div>
                    <a href=\"<?php echo wc_get_cart_url() ?>\" class=\"cart-mobile visible-xs\"
                       title=\"<?= _e('Giỏ hàng', 'tn_component') ?>\">
                        <span class=\"fa fa-shopping-cart\"></span>
                        <span class=\"count\">(<?php echo WC()->cart->get_cart_contents_count() ?>)</span>
                    </a>
                </div>
                <div class=\"col-lg-4 col-md-4 col-xs-12 text-center\">
                    <div class=\"logo\"><?= az_box_logo_primary() ?></div>
                </div>
                <div class=\"col-lg-4 col-md-4 col-xs-12 col-cat-mobile\">
                    <a href=\"#menu_mobile\" class=\"visible-xs item-menu\"><i
                            class=\"fa fa-bars\"></i> <?= _e('DANH MỤC SẢN PHẨM', 'tn_component') ?></a>
                    <nav id=\"menu_mobile\">
                        <?php
                                    wp_nav_menu(array(
                                            'theme_location' => 'h025_category_menu',
                        'container' => 'false',
                        'menu_id' => '',
                        'menu_class' => 'hidden-sm hidden-md hidden-lg hidden-xs',
                        )
                        ); ?>
                    </nav>

                    <div class=\"info-container\">

                        <div class=\"info template-login\">
                            <?php
                                        if (is_user_logged_in()) {
                                            \$current_user = wp_get_current_user();
                                            ?>
                            <div class=\"menu_log_grp\">
                                <a href=\"<?= get_page_link(62) ?>\"
                                   title=\"<?= \$current_user->display_name ?>\">
                                    <img src=\"<?= \$this->getPath() ?>images/uc.png\"
                                         alt=\"user\"> <?= \$current_user->display_name ?>
                                </a>
                            </div>
                            <?php } else { ?>

                            <div class=\"menu_log_grp\">
                                <img src=\"<?= \$this->getPath() ?>images/uc.png\" alt=\"user\">
                                <a href=\"<?= get_page_link(2250); ?>\" class=\"item-dk items\"
                                   title=\"<?= _e('Đăng ký', 'tn_component') ?>\"> <?= _e('Đăng ký', 'tn_component') ?></a>/
                                <a data-fancybox data-src=\"#form-login\" href=\"javascript:;\"
                                   title=\"<?= _e('Đăng nhập', 'tn_component') ?>\" class=\"item-dk items\">
                                    <?= _e('Đăng nhập', 'tn_component') ?>
                                </a>
                                <div id=\"form-login\" style=\"display: none;width:100%;max-width:420px;\">
                                    <p class=\"title\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i>
                                        <?= _e('ĐĂNG NHẬP HOẶC ĐĂNG KÝ TÀI KHOẢN', 'tn_component') ?>
                                    </p>
                                    <div class=\"form\">
                                        <?= do_shortcode('[wpuf-login]'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class=\"info cart hidden-xs\">
                            <a href=\"<?php echo wc_get_cart_url() ?>\" class=\"btn-cart\"
                               title=\"<?= _e('Giỏ hàng', 'tn_component') ?>\">
                                <span class=\"fa fa-shopping-cart\"></span>
                                <span class=\"count\"><?= _e('Giỏ hàng', 'tn_component') ?> (<b><?php echo WC()->
                                    cart->get_cart_contents_count() ?></b>)</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"bottom-header hidden-xs hidden-sm\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-1 col-md-1 col-sm-12 col-xs-12 col-mega hidden-sm hidden-xs col-190\">
                    <div class=\"menu_mega\">
                        <div class=\"title_menu\">
                                        <span class=\"nav_button\">
                                            <i class=\"fa fa-bars\" aria-hidden=\"true\"></i>
                                        </span>
                            <span class=\"title\"></span>
                        </div>
                        <div class=\"list_menu_header menu_all_site col-lg-3 col-md-3\">
                            ";
        // line 166
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("mainMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 167
        echo "                        </div>
                    </div>
                </div>
                <div class=\"col-lg-11 col-md-11 col-sm-12 col-xs-12 col-mega-190\">
                    <div class=\"bg-header-nav hidden-xs hidden-sm\">
                        <nav class=\"header-nav\">
                            ";
        // line 173
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("mainMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 174
        echo "                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
";
    }

    public function getTemplateName()
    {
        return "M:\\DATA\\octobertn/plugins/toannang/componentbuilder/components/lepthpcosmeticsheader/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 174,  232 => 173,  224 => 167,  220 => 166,  117 => 66,  92 => 43,  88 => 42,  55 => 11,  51 => 10,  42 => 6,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"mobile-layer-h025\"></div>
<div id=\"sidenav-h025\" class=\"sidenav menu_mobile hidden-md hidden-lg\">
    <div class=\"top_menu_mobile\">
        <span class=\"close-menu\"><i class=\"fa fa-times-rectangle\"></i> </span>
        <div class=\"logo-mobile-menu\">
            <img src=\"{{ logo }}\" alt=\"{{ site_name }}\"/>
        </div>
    </div>
    <div class=\"content_memu_mb\">
        {% component \"mainMenu\" %}
    </div>
</div>
<header id=\"header-h025\">
    <div class=\"header-top\">
        <div class=\"container\">
            <?php if (!empty(\$social)): ?>
            <div class=\"col-lg-2\">
                <ul class=\"top-social\">
                    <li>
                        <a href=\"<?= \$social['facebook'] ?>\" target=\"_blank\" title=\"Facebook\">
                            <img src=\"<?= \$this->getPath() ?>images/facebook.png\"
                                 alt=\"Facebook\">
                        </a>
                    </li>
                    <li>
                        <a href=\"<?= \$social['youtube'] ?>\" target=\"_blank\" title=\"Youtube\">
                            <img src=\"<?= \$this->getPath() ?>images/youtube.png\" alt=\"Youtube\">
                        </a>
                    </li>
                    <li>
                        <a href=\"<?= \$social['google'] ?>\" target=\"_blank\" title=\"Google\">
                            <img src=\"<?= \$this->getPath() ?>images/google-plus.png\"
                                 alt=\"Google\">
                        </a>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
            <div class=\"col-lg-6\"></div>
            <div class=\"col-lg-4\">
                <div class=\"language\">
                    {% partial \"lang-switcher\" %}
                </div>
                <div class=\"hotline\">
                    <ul>
                        <li>
                            <span><?php _e(\"Holine\", \"tn_component\") ?> : </span>
                            <a class=\"holine\"
                               href=\"tel:<?php _e(\$info['hotline']) ?>\"><?php _e(\$info['hotline']) ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class=\"main-header\">
        <div class=\"container\">
            <div class=\"row flex-row\">


                <div class=\"col-lg-4 col-md-4 col-xs-12 cart-mobile\">
                    <div class=\"menu-bar-h nav-mobile-button visible-xs\">
                        <a href=\"#\"><i class=\"fa fa-bars\"></i> </a>
                    </div>
                    <div class=\"search-container\">
                        <form action=\"{{ url('search') }}\" method=\"get\">
                            <input type=\"text\" name=\"s\"
                                   placeholder=\"<?= __('Tìm kiếm sản phẩm', 'tn_component') ?>\"
                                   autocomplete=\"off\">
                            <div class=\"select-box\">
                                <select name=\"term_id\" id=\"sel1\">
                                    <option>Tất cả</option>
                                </select>
                                <span class=\"fa fa-angle-down\"></span>
                            </div>
                            <button type=\"submit\" class=\"btn-send\"><span class=\"fa fa-search\"></span>
                            </button>
                        </form>
                    </div>
                    <a href=\"<?php echo wc_get_cart_url() ?>\" class=\"cart-mobile visible-xs\"
                       title=\"<?= _e('Giỏ hàng', 'tn_component') ?>\">
                        <span class=\"fa fa-shopping-cart\"></span>
                        <span class=\"count\">(<?php echo WC()->cart->get_cart_contents_count() ?>)</span>
                    </a>
                </div>
                <div class=\"col-lg-4 col-md-4 col-xs-12 text-center\">
                    <div class=\"logo\"><?= az_box_logo_primary() ?></div>
                </div>
                <div class=\"col-lg-4 col-md-4 col-xs-12 col-cat-mobile\">
                    <a href=\"#menu_mobile\" class=\"visible-xs item-menu\"><i
                            class=\"fa fa-bars\"></i> <?= _e('DANH MỤC SẢN PHẨM', 'tn_component') ?></a>
                    <nav id=\"menu_mobile\">
                        <?php
                                    wp_nav_menu(array(
                                            'theme_location' => 'h025_category_menu',
                        'container' => 'false',
                        'menu_id' => '',
                        'menu_class' => 'hidden-sm hidden-md hidden-lg hidden-xs',
                        )
                        ); ?>
                    </nav>

                    <div class=\"info-container\">

                        <div class=\"info template-login\">
                            <?php
                                        if (is_user_logged_in()) {
                                            \$current_user = wp_get_current_user();
                                            ?>
                            <div class=\"menu_log_grp\">
                                <a href=\"<?= get_page_link(62) ?>\"
                                   title=\"<?= \$current_user->display_name ?>\">
                                    <img src=\"<?= \$this->getPath() ?>images/uc.png\"
                                         alt=\"user\"> <?= \$current_user->display_name ?>
                                </a>
                            </div>
                            <?php } else { ?>

                            <div class=\"menu_log_grp\">
                                <img src=\"<?= \$this->getPath() ?>images/uc.png\" alt=\"user\">
                                <a href=\"<?= get_page_link(2250); ?>\" class=\"item-dk items\"
                                   title=\"<?= _e('Đăng ký', 'tn_component') ?>\"> <?= _e('Đăng ký', 'tn_component') ?></a>/
                                <a data-fancybox data-src=\"#form-login\" href=\"javascript:;\"
                                   title=\"<?= _e('Đăng nhập', 'tn_component') ?>\" class=\"item-dk items\">
                                    <?= _e('Đăng nhập', 'tn_component') ?>
                                </a>
                                <div id=\"form-login\" style=\"display: none;width:100%;max-width:420px;\">
                                    <p class=\"title\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i>
                                        <?= _e('ĐĂNG NHẬP HOẶC ĐĂNG KÝ TÀI KHOẢN', 'tn_component') ?>
                                    </p>
                                    <div class=\"form\">
                                        <?= do_shortcode('[wpuf-login]'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class=\"info cart hidden-xs\">
                            <a href=\"<?php echo wc_get_cart_url() ?>\" class=\"btn-cart\"
                               title=\"<?= _e('Giỏ hàng', 'tn_component') ?>\">
                                <span class=\"fa fa-shopping-cart\"></span>
                                <span class=\"count\"><?= _e('Giỏ hàng', 'tn_component') ?> (<b><?php echo WC()->
                                    cart->get_cart_contents_count() ?></b>)</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"bottom-header hidden-xs hidden-sm\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-1 col-md-1 col-sm-12 col-xs-12 col-mega hidden-sm hidden-xs col-190\">
                    <div class=\"menu_mega\">
                        <div class=\"title_menu\">
                                        <span class=\"nav_button\">
                                            <i class=\"fa fa-bars\" aria-hidden=\"true\"></i>
                                        </span>
                            <span class=\"title\"></span>
                        </div>
                        <div class=\"list_menu_header menu_all_site col-lg-3 col-md-3\">
                            {% component \"mainMenu\" %}
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-11 col-md-11 col-sm-12 col-xs-12 col-mega-190\">
                    <div class=\"bg-header-nav hidden-xs hidden-sm\">
                        <nav class=\"header-nav\">
                            {% component \"mainMenu\" %}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
", "M:\\DATA\\octobertn/plugins/toannang/componentbuilder/components/lepthpcosmeticsheader/default.htm", "");
    }
}
