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

/* D:\Works\Laravel\revolutionclothing/plugins/toannang/componentbuilder/components/lamrevolutionclothingfooter/default.htm */
class __TwigTemplate_35cd073311bf0e4eccd9f3d21caa7e5bcb2bb782a3ad046b7dc32da153cd4c0f extends \Twig\Template
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
        echo "<footer>
    <div class=\"footer-top\" id=\"footer_top\">
        <div class=\"container\">
            <column class=\"position-display\">
                <div>
                    <div class=\"dv-builder-full\">
                        <div class=\"dv-builder  vertical_footer\">
                            <div class=\"dv-module-content\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3 col-md-3 col-lg-3 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"html-block\">
                                                <h3 class=\"title\"><span>";
        // line 13
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Our Store"]);
        echo "</span></h3>
                                                <div class=\"html-content\">
                                                    <p><span style=\"font-weight: bold;\">";
        // line 15
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Address"]);
        echo ":</span> ";
        echo twig_escape_filter($this->env, ($context["address"] ?? null), "html", null, true);
        echo "</p>
                                                    <p><span style=\"font-weight: bold;\">";
        // line 16
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Phone"]);
        echo ":</span> ";
        echo twig_escape_filter($this->env, ($context["phone"] ?? null), "html", null, true);
        echo "</p>
                                                    <p><span style=\"font-weight: bold;\">Hotline:</span> ";
        // line 17
        echo twig_escape_filter($this->env, ($context["hotline"] ?? null), "html", null, true);
        echo "
                                                    </p>
                                                    <p><span style=\"font-weight: bold;\">Email:</span>";
        // line 19
        echo twig_escape_filter($this->env, ($context["email"] ?? null), "html", null, true);
        echo "</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-3 col-md-3 col-lg-3 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"wapper-menu\">
                                                <div class=\"close-header-layer\"></div>
                                                <div class=\"menu_vertical\" id=\"menu_id_footer1\">
                                                    <div class=\"vertical-name\">
                                                        <h4 class=\"title\">
                                                                <span class=\"btn-open-mobile\"><i
                                                                        class=\"fa fa-bars\"></i></span>
                                                            <a href=\"javascript:;\" class=\"title-menu\"
                                                               data-toggle=\"collapse\"
                                                               data-target=\"#navbar-collapse-footer1\">
                                                                ";
        // line 35
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Information"]);
        echo " </a>
                                                        </h4>
                                                        <div class=\"mask-container\"></div>
                                                        <div id=\"navbar-collapse-footer1\" class=\"menu-content\">
                                                            <div class=\"close-menu\"></div>
                                                            ";
        // line 40
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("thongtinMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 41
        echo "                                                        </div>
                                                    </div>
                                                    <div class=\"clearfix\"></div>
                                                </div>
                                                <script>
                                                    \$(function () {
                                                        window.prettyPrint && prettyPrint()
                                                        \$(document).on('click', '.navbar .dropdown-menu', function (e) {
                                                            e.stopPropagation()
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-2 col-md-2 col-lg-2 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"wapper-menu\">
                                                <div class=\"close-header-layer\"></div>
                                                <div class=\"menu_vertical\" id=\"menu_id_tai_khoan\">
                                                    <div class=\"vertical-name\">
                                                        <h4 class=\"title\">
                                                                <span class=\"btn-open-mobile\"><i
                                                                        class=\"fa fa-bars\"></i></span>
                                                            <a href=\"javascript:;\" class=\"title-menu\"
                                                               data-toggle=\"collapse\"
                                                               data-target=\"#navbar-collapse-tai_khoan\">
                                                                ";
        // line 68
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["My Account"]);
        echo " </a>
                                                        </h4>
                                                        <div class=\"mask-container\"></div>
                                                        <div id=\"navbar-collapse-tai_khoan\" class=\"menu-content\">
                                                            <div class=\"close-menu\"></div>
                                                            ";
        // line 73
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("taikhoanMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 74
        echo "                                                        </div>
                                                    </div>
                                                    <div class=\"clearfix\"></div>
                                                </div>
                                                <script>
                                                    \$(function () {
                                                        window.prettyPrint && prettyPrint()
                                                        \$(document).on('click', '.navbar .dropdown-menu', function (e) {
                                                            e.stopPropagation()
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-2 col-md-2 col-lg-2 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"wapper-menu\">
                                                <div class=\"close-header-layer\"></div>
                                                <div class=\"menu_vertical\" id=\"menu_id_dich_vu\">
                                                    <div class=\"vertical-name\">
                                                        <h4 class=\"title\">
                                                                <span class=\"btn-open-mobile\"><i
                                                                        class=\"fa fa-bars\"></i></span>
                                                            <a href=\"javascript:;\" class=\"title-menu\"
                                                               data-toggle=\"collapse\"
                                                               data-target=\"#navbar-collapse-dich_vu\">
                                                                ";
        // line 101
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Services"]);
        echo " </a>
                                                        </h4>
                                                        <div class=\"mask-container\"></div>
                                                        <div id=\"navbar-collapse-dich_vu\" class=\"menu-content\">
                                                            <div class=\"close-menu\"></div>
                                                            ";
        // line 106
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("dichvuMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 107
        echo "                                                        </div>
                                                    </div>
                                                    <div class=\"clearfix\"></div>
                                                </div>
                                                <script>
                                                    \$(function () {
                                                        window.prettyPrint && prettyPrint()
                                                        \$(document).on('click', '.navbar .dropdown-menu', function (e) {
                                                            e.stopPropagation()
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-2 col-md-2 col-lg-2 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"content_info footer-social\">
                                                <h3 class=\"title\"><span>";
        // line 125
        echo call_user_func_array($this->env->getFilter('_')->getCallable(), ["Socials"]);
        echo "</span></h3>
                                                <div class=\"content_inner\">
                                                    ";
        // line 127
        if (($context["socials"] ?? null)) {
            // line 128
            echo "                                                    <ul class=\"list\">
                                                        ";
            // line 129
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["socials"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["social"]) {
                // line 130
                echo "                                                        <li class=\"item-content\">
                                                            <a href=\"";
                // line 131
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["social"], "link_social", [], "any", false, false, false, 131), "html", null, true);
                echo "\">
                                                                <div class=\"inner-content\">
                                                                    <div class=\"item-image\">
                                                                        <i class=\"";
                // line 134
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["social"], "class_social", [], "any", false, false, false, 134), "html", null, true);
                echo "\"></i>
                                                                    </div>
                                                                    <div class=\"text\">
                                                                        <div class=\"item-title\">";
                // line 137
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["social"], "name_social", [], "any", false, false, false, 137), "html", null, true);
                echo "</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['social'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 143
            echo "                                                    </ul>
                                                    ";
        }
        // line 145
        echo "                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </column>
        </div>
    </div>
    <div class=\"footer-bottom\" id=\"footer_bottom\">
        <div class=\"container\">
            <div class=\"footer-bottom-content\">
                <div class=\"row\">
                    <div class=\"col-sm-8 col-xs-12 copyright text-left\">
                        <column class=\"position-display\">
                            <div>
                                <div class=\"dv-builder-full\">
                                    <div class=\"dv-builder \">
                                        <div class=\"dv-module-content\">
                                            <div class=\"row\">
                                                <div class=\"col-sm-12 col-md-12 col-lg-12 col-xs-12\">
                                                    <div class=\"dv-item-module \">
                                                        <div class=\"html-block\">
                                                            <div class=\"html-content\">
                                                                ";
        // line 172
        echo twig_escape_filter($this->env, ($context["copyright"] ?? null), "html", null, true);
        echo "
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </column>
                    </div>
                    <div class=\"col-sm-4 col-xs-12 chili text-right\">
                        <div style=\"white-space:nowrap;display: block;overflow: hidden;\">
                            <a style=\"color:#000000;font-size:12px;\" target=\"_blank\" href=\"https://toannang.com.vn/\">Develop by Toan Nang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class=\"sticky-bottom\">
    <div id=\"pcSupport\" class=\"wrap\">
        <a href=\"tel:19007179\">Hotline 24/7: 1900 7179</a>
    </div>
</div>
<a href=\"tel:19007179\" mypage=\"\" class=\"call-now\" rel=\"nofollow\">
    <div class=\"mypage-alo-phone\">
        <div class=\"animated infinite zoomIn mypage-alo-ph-circle\"></div>
        <div class=\"animated infinite pulse mypage-alo-ph-circle-fill\"></div>
        <div class=\"animated infinite tada mypage-alo-ph-img-circle\"></div>
    </div>
</a>";
    }

    public function getTemplateName()
    {
        return "D:\\Works\\Laravel\\revolutionclothing/plugins/toannang/componentbuilder/components/lamrevolutionclothingfooter/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 172,  249 => 145,  245 => 143,  233 => 137,  227 => 134,  221 => 131,  218 => 130,  214 => 129,  211 => 128,  209 => 127,  204 => 125,  184 => 107,  180 => 106,  172 => 101,  143 => 74,  139 => 73,  131 => 68,  102 => 41,  98 => 40,  90 => 35,  71 => 19,  66 => 17,  60 => 16,  54 => 15,  49 => 13,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer>
    <div class=\"footer-top\" id=\"footer_top\">
        <div class=\"container\">
            <column class=\"position-display\">
                <div>
                    <div class=\"dv-builder-full\">
                        <div class=\"dv-builder  vertical_footer\">
                            <div class=\"dv-module-content\">
                                <div class=\"row\">
                                    <div class=\"col-sm-3 col-md-3 col-lg-3 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"html-block\">
                                                <h3 class=\"title\"><span>{{ 'Our Store'|_ }}</span></h3>
                                                <div class=\"html-content\">
                                                    <p><span style=\"font-weight: bold;\">{{ 'Address'|_ }}:</span> {{ address }}</p>
                                                    <p><span style=\"font-weight: bold;\">{{ 'Phone'|_ }}:</span> {{ phone }}</p>
                                                    <p><span style=\"font-weight: bold;\">Hotline:</span> {{ hotline }}
                                                    </p>
                                                    <p><span style=\"font-weight: bold;\">Email:</span>{{ email }}</p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-3 col-md-3 col-lg-3 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"wapper-menu\">
                                                <div class=\"close-header-layer\"></div>
                                                <div class=\"menu_vertical\" id=\"menu_id_footer1\">
                                                    <div class=\"vertical-name\">
                                                        <h4 class=\"title\">
                                                                <span class=\"btn-open-mobile\"><i
                                                                        class=\"fa fa-bars\"></i></span>
                                                            <a href=\"javascript:;\" class=\"title-menu\"
                                                               data-toggle=\"collapse\"
                                                               data-target=\"#navbar-collapse-footer1\">
                                                                {{ 'Information'|_ }} </a>
                                                        </h4>
                                                        <div class=\"mask-container\"></div>
                                                        <div id=\"navbar-collapse-footer1\" class=\"menu-content\">
                                                            <div class=\"close-menu\"></div>
                                                            {% component \"thongtinMenu\" %}
                                                        </div>
                                                    </div>
                                                    <div class=\"clearfix\"></div>
                                                </div>
                                                <script>
                                                    \$(function () {
                                                        window.prettyPrint && prettyPrint()
                                                        \$(document).on('click', '.navbar .dropdown-menu', function (e) {
                                                            e.stopPropagation()
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-2 col-md-2 col-lg-2 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"wapper-menu\">
                                                <div class=\"close-header-layer\"></div>
                                                <div class=\"menu_vertical\" id=\"menu_id_tai_khoan\">
                                                    <div class=\"vertical-name\">
                                                        <h4 class=\"title\">
                                                                <span class=\"btn-open-mobile\"><i
                                                                        class=\"fa fa-bars\"></i></span>
                                                            <a href=\"javascript:;\" class=\"title-menu\"
                                                               data-toggle=\"collapse\"
                                                               data-target=\"#navbar-collapse-tai_khoan\">
                                                                {{ 'My Account'|_ }} </a>
                                                        </h4>
                                                        <div class=\"mask-container\"></div>
                                                        <div id=\"navbar-collapse-tai_khoan\" class=\"menu-content\">
                                                            <div class=\"close-menu\"></div>
                                                            {% component \"taikhoanMenu\" %}
                                                        </div>
                                                    </div>
                                                    <div class=\"clearfix\"></div>
                                                </div>
                                                <script>
                                                    \$(function () {
                                                        window.prettyPrint && prettyPrint()
                                                        \$(document).on('click', '.navbar .dropdown-menu', function (e) {
                                                            e.stopPropagation()
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-2 col-md-2 col-lg-2 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"wapper-menu\">
                                                <div class=\"close-header-layer\"></div>
                                                <div class=\"menu_vertical\" id=\"menu_id_dich_vu\">
                                                    <div class=\"vertical-name\">
                                                        <h4 class=\"title\">
                                                                <span class=\"btn-open-mobile\"><i
                                                                        class=\"fa fa-bars\"></i></span>
                                                            <a href=\"javascript:;\" class=\"title-menu\"
                                                               data-toggle=\"collapse\"
                                                               data-target=\"#navbar-collapse-dich_vu\">
                                                                {{ 'Services'|_ }} </a>
                                                        </h4>
                                                        <div class=\"mask-container\"></div>
                                                        <div id=\"navbar-collapse-dich_vu\" class=\"menu-content\">
                                                            <div class=\"close-menu\"></div>
                                                            {% component \"dichvuMenu\" %}
                                                        </div>
                                                    </div>
                                                    <div class=\"clearfix\"></div>
                                                </div>
                                                <script>
                                                    \$(function () {
                                                        window.prettyPrint && prettyPrint()
                                                        \$(document).on('click', '.navbar .dropdown-menu', function (e) {
                                                            e.stopPropagation()
                                                        })
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-2 col-md-2 col-lg-2 col-xs-12\">
                                        <div class=\"dv-item-module \">
                                            <div class=\"content_info footer-social\">
                                                <h3 class=\"title\"><span>{{ 'Socials'|_ }}</span></h3>
                                                <div class=\"content_inner\">
                                                    {% if(socials)%}
                                                    <ul class=\"list\">
                                                        {% for social in socials %}
                                                        <li class=\"item-content\">
                                                            <a href=\"{{ social.link_social }}\">
                                                                <div class=\"inner-content\">
                                                                    <div class=\"item-image\">
                                                                        <i class=\"{{ social.class_social }}\"></i>
                                                                    </div>
                                                                    <div class=\"text\">
                                                                        <div class=\"item-title\">{{ social.name_social }}</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        {% endfor %}
                                                    </ul>
                                                    {% endif %}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </column>
        </div>
    </div>
    <div class=\"footer-bottom\" id=\"footer_bottom\">
        <div class=\"container\">
            <div class=\"footer-bottom-content\">
                <div class=\"row\">
                    <div class=\"col-sm-8 col-xs-12 copyright text-left\">
                        <column class=\"position-display\">
                            <div>
                                <div class=\"dv-builder-full\">
                                    <div class=\"dv-builder \">
                                        <div class=\"dv-module-content\">
                                            <div class=\"row\">
                                                <div class=\"col-sm-12 col-md-12 col-lg-12 col-xs-12\">
                                                    <div class=\"dv-item-module \">
                                                        <div class=\"html-block\">
                                                            <div class=\"html-content\">
                                                                {{ copyright }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </column>
                    </div>
                    <div class=\"col-sm-4 col-xs-12 chili text-right\">
                        <div style=\"white-space:nowrap;display: block;overflow: hidden;\">
                            <a style=\"color:#000000;font-size:12px;\" target=\"_blank\" href=\"https://toannang.com.vn/\">Develop by Toan Nang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class=\"sticky-bottom\">
    <div id=\"pcSupport\" class=\"wrap\">
        <a href=\"tel:19007179\">Hotline 24/7: 1900 7179</a>
    </div>
</div>
<a href=\"tel:19007179\" mypage=\"\" class=\"call-now\" rel=\"nofollow\">
    <div class=\"mypage-alo-phone\">
        <div class=\"animated infinite zoomIn mypage-alo-ph-circle\"></div>
        <div class=\"animated infinite pulse mypage-alo-ph-circle-fill\"></div>
        <div class=\"animated infinite tada mypage-alo-ph-img-circle\"></div>
    </div>
</a>", "D:\\Works\\Laravel\\revolutionclothing/plugins/toannang/componentbuilder/components/lamrevolutionclothingfooter/default.htm", "");
    }
}
