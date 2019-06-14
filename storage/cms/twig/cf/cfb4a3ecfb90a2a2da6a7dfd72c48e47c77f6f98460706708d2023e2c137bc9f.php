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

/* D:\Works\Laravel\revolutionclothing/themes/toannang/layouts/master.htm */
class __TwigTemplate_a3a1ed6a37804fb44053acdfa80ae595470ec355734f3d6b86411826a8e75c93 extends \Twig\Template
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
        echo "<!DOCTYPE html>
<html dir=\"ltr\" lang=\"vi\">
<head>
    ";
        // line 4
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("meta"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 5
        echo "</head>
<body class=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 6), "baseFileName", [], "any", false, false, false, 6), "html", null, true);
        echo "\">
    <div class=\"wrapper\"></div>
    ";
        // line 8
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("LamRevolutionClothingHeader"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 9
        echo "    ";
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFunction();
        // line 10
        echo "    ";
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("staticPage"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 11
        echo "    ";
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("LamRevolutionClothingFooter"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 12
        echo "    <script src=\"";
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/js/bootstrap/js/bootstrap.min.js");
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 13
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/js/common.js");
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 14
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/vendor/owl-carousel/owl.carousel.min.js");
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 15
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/js/jquery.scrollUp.min.js");
        echo "\" type=\"text/javascript\"></script>
    ";
        // line 16
        echo $this->env->getExtension('Cms\Twig\Extension')->assetsFunction('js');
        echo $this->env->getExtension('Cms\Twig\Extension')->displayBlock('scripts');
        // line 17
        echo "    <script src=\"";
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/js/main.js");
        echo "\" type=\"text/javascript\"></script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "D:\\Works\\Laravel\\revolutionclothing/themes/toannang/layouts/master.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 17,  86 => 16,  82 => 15,  78 => 14,  74 => 13,  69 => 12,  64 => 11,  59 => 10,  56 => 9,  52 => 8,  47 => 6,  44 => 5,  40 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html dir=\"ltr\" lang=\"vi\">
<head>
    {% partial \"meta\" %}
</head>
<body class=\"{{ this.page.baseFileName }}\">
    <div class=\"wrapper\"></div>
    {% component 'LamRevolutionClothingHeader' %}
    {% page %}
    {% component 'staticPage' %}
    {% component 'LamRevolutionClothingFooter' %}
    <script src=\"{{ 'assets/js/bootstrap/js/bootstrap.min.js'|theme }}\" type=\"text/javascript\"></script>
    <script src=\"{{ 'assets/js/common.js'|theme }}\" type=\"text/javascript\"></script>
    <script src=\"{{ 'assets/vendor/owl-carousel/owl.carousel.min.js'|theme }}\" type=\"text/javascript\"></script>
    <script src=\"{{ 'assets/js/jquery.scrollUp.min.js'|theme }}\" type=\"text/javascript\"></script>
    {% scripts %}
    <script src=\"{{ 'assets/js/main.js'|theme }}\" type=\"text/javascript\"></script>
</body>
</html>", "D:\\Works\\Laravel\\revolutionclothing/themes/toannang/layouts/master.htm", "");
    }
}
