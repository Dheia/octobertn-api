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

/* D:\Works\Laravel\revolutionclothing/plugins/toannang/componentbuilder/components/lamrevolutionclothingheader/default.htm */
class __TwigTemplate_7e75cc74f82872a11a5de86f475a123dce3f53908e40f67244b11f6eba3d7b8d extends \Twig\Template
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
        echo "<header>
    <div class=\"top\" id=\"top\">
        <div class=\"container\">
            <div class=\"top-content\">
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        <div class=\"top-right\">
                            <div id=\"top-links\">
                                <div class=\"moreinfo\">
                                    <i class=\"fa fa-align-right\"></i>
                                    <ul class=\"moreinfo-content\">
                                        <li><a href=\"#\" title=\"Đăng Nhập\"><span>Đăng Nhập</span></a>
                                        </li>
                                        <li><a href=\"#\" id=\"wishlist-total\"
                                               title=\"Yêu thích (0)\"><span>Yêu thích (0)</span></a></li>
                                        <li><a href=\"#\" title=\"Thanh toán\"> <span>Thanh toán</span></a>
                                        </li>
                                        <li><a href=\"#\" title=\"Tài Khoản\"><span>Tài Khoản</span> </span>
                                        </a></li>
                                    </ul>
                                </div>
                                <div class=\"language\">
                                    <div>

                                            <div class=\"btn-group\">
                                                ";
        // line 26
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("lang-switcher"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 27
        echo "                                            </div>
                                            <input type=\"hidden\" name=\"code\" value=\"\"/>
                                            <input type=\"hidden\" name=\"redirect\"
                                                   value=\"#\"/>

                                    </div>
                                </div>
                                <div class=\"top-cart\">
                                    <div id=\"cart\" class=\"btn-group btn-block\">
                                        <a href=\"#\"
                                                class=\"btn btn-inverse btn-block btn-lg cart-btn\"><i
                                                class=\"fa fa-shopping-cart\"></i><span id=\"cart-total\"><span
                                                class=\"num_product\">0</span> <span
                                                class=\"text-cart\">sản phẩm  </span> <span
                                                class=\"price\">0 VNĐ</span></span></a>

                                    </div>
                                </div>
                                <div class=\"top-search\">
                                    <div id=\"search_box\">
                                        <i class=\"fa fa-search\"></i>
                                        <div id=\"search\">
                                            <div class=\"search-inner\">
                                                <form action=\"";
        // line 50
        echo url("search");
        echo "\" method=\"get\">
                                                <input type=\"text\" name=\"search\" value=\"\"
                                                       placeholder=\"Tìm kiếm sản phẩm\" class=\"form-control input-lg\"/>
                                                <span class=\"button_search\">
                <button type=\"button\" class=\"btn btn-default btn-lg\"><i class=\"fa fa-search\"></i></button>
              </span></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <column class=\"position-display\">
                            <div>
                                <div id=\"logo\">
                                    <a href=\"";
        // line 65
        echo url("/");
        echo "\">
                                        ";
        // line 66
        if ((null === ($context["logo"] ?? null))) {
            // line 67
            echo "                                        ";
            echo twig_escape_filter($this->env, ($context["site_name"] ?? null), "html", null, true);
            echo "
                                        ";
        } else {
            // line 69
            echo "                                        <img src=\"";
            echo twig_escape_filter($this->env, ($context["logo"] ?? null), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, ($context["site_name"] ?? null), "html", null, true);
            echo "\"
                                             alt=\"";
            // line 70
            echo twig_escape_filter($this->env, ($context["site_name"] ?? null), "html", null, true);
            echo "\" class=\"img-responsive \"/>
                                        ";
        }
        // line 72
        echo "                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class=\"wapper-menu\">
                                    <div class=\"close-header-layer\"></div>
                                    <div class=\"menu_horizontal\" id=\"menu_id_MB01\">
                                        <div class=\"navbar-header\">
                                            <button type=\"button\" data-toggle=\"collapse\"
                                                    data-target=\"#navbar-collapse-MB01\" class=\"navbar-toggle\">
                                                <span class=\"icon-bar\"></span>
                                                <span class=\"icon-bar\"></span>
                                                <span class=\"icon-bar\"></span>
                                            </button>
                                        </div>
                                        <div class=\"mask-container\"></div>
                                        <div id=\"navbar-collapse-MB01\" class=\"menu-content\">
                                            <div class=\"close-menu\"></div>
                                            ";
        // line 90
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("mainMenu"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 91
        echo "                                        </div>
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
                        </column>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "D:\\Works\\Laravel\\revolutionclothing/plugins/toannang/componentbuilder/components/lamrevolutionclothingheader/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 91,  153 => 90,  133 => 72,  128 => 70,  121 => 69,  115 => 67,  113 => 66,  109 => 65,  91 => 50,  66 => 27,  62 => 26,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header>
    <div class=\"top\" id=\"top\">
        <div class=\"container\">
            <div class=\"top-content\">
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        <div class=\"top-right\">
                            <div id=\"top-links\">
                                <div class=\"moreinfo\">
                                    <i class=\"fa fa-align-right\"></i>
                                    <ul class=\"moreinfo-content\">
                                        <li><a href=\"#\" title=\"Đăng Nhập\"><span>Đăng Nhập</span></a>
                                        </li>
                                        <li><a href=\"#\" id=\"wishlist-total\"
                                               title=\"Yêu thích (0)\"><span>Yêu thích (0)</span></a></li>
                                        <li><a href=\"#\" title=\"Thanh toán\"> <span>Thanh toán</span></a>
                                        </li>
                                        <li><a href=\"#\" title=\"Tài Khoản\"><span>Tài Khoản</span> </span>
                                        </a></li>
                                    </ul>
                                </div>
                                <div class=\"language\">
                                    <div>

                                            <div class=\"btn-group\">
                                                {% partial \"lang-switcher\" %}
                                            </div>
                                            <input type=\"hidden\" name=\"code\" value=\"\"/>
                                            <input type=\"hidden\" name=\"redirect\"
                                                   value=\"#\"/>

                                    </div>
                                </div>
                                <div class=\"top-cart\">
                                    <div id=\"cart\" class=\"btn-group btn-block\">
                                        <a href=\"#\"
                                                class=\"btn btn-inverse btn-block btn-lg cart-btn\"><i
                                                class=\"fa fa-shopping-cart\"></i><span id=\"cart-total\"><span
                                                class=\"num_product\">0</span> <span
                                                class=\"text-cart\">sản phẩm  </span> <span
                                                class=\"price\">0 VNĐ</span></span></a>

                                    </div>
                                </div>
                                <div class=\"top-search\">
                                    <div id=\"search_box\">
                                        <i class=\"fa fa-search\"></i>
                                        <div id=\"search\">
                                            <div class=\"search-inner\">
                                                <form action=\"{{ url('search') }}\" method=\"get\">
                                                <input type=\"text\" name=\"search\" value=\"\"
                                                       placeholder=\"Tìm kiếm sản phẩm\" class=\"form-control input-lg\"/>
                                                <span class=\"button_search\">
                <button type=\"button\" class=\"btn btn-default btn-lg\"><i class=\"fa fa-search\"></i></button>
              </span></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <column class=\"position-display\">
                            <div>
                                <div id=\"logo\">
                                    <a href=\"{{ url('/') }}\">
                                        {% if logo is null %}
                                        {{ site_name }}
                                        {% else %}
                                        <img src=\"{{ logo }}\" title=\"{{ site_name }}\"
                                             alt=\"{{ site_name }}\" class=\"img-responsive \"/>
                                        {% endif %}
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class=\"wapper-menu\">
                                    <div class=\"close-header-layer\"></div>
                                    <div class=\"menu_horizontal\" id=\"menu_id_MB01\">
                                        <div class=\"navbar-header\">
                                            <button type=\"button\" data-toggle=\"collapse\"
                                                    data-target=\"#navbar-collapse-MB01\" class=\"navbar-toggle\">
                                                <span class=\"icon-bar\"></span>
                                                <span class=\"icon-bar\"></span>
                                                <span class=\"icon-bar\"></span>
                                            </button>
                                        </div>
                                        <div class=\"mask-container\"></div>
                                        <div id=\"navbar-collapse-MB01\" class=\"menu-content\">
                                            <div class=\"close-menu\"></div>
                                            {% component \"mainMenu\" %}
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
                        </column>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</header>", "D:\\Works\\Laravel\\revolutionclothing/plugins/toannang/componentbuilder/components/lamrevolutionclothingheader/default.htm", "");
    }
}
