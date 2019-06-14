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

/* M:\DATA\octobertn/themes/toannang/partials/meta.htm */
class __TwigTemplate_01be288a4aec350bc99f37c36d50bbab5637bed9f15d1283f102b91018d28fa1 extends \Twig\Template
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
        echo "<meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\"/>
    <meta name=\"description\" content=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 4), "meta_description", [], "any", false, false, false, 4), "html", null, true);
        echo "\">
    <meta name=\"keywords\" content=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 5), "meta_keywords", [], "any", false, false, false, 5), "html", null, true);
        echo "\">
    <meta name=\"title\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 6), "meta_title", [], "any", false, false, false, 6), "html", null, true);
        echo "\">
    <meta name=\"author\" content=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 7), "meta_author", [], "any", false, false, false, 7), "html", null, true);
        echo "\">
    <title>";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 8), "meta_title", [], "any", false, false, false, 8), "html", null, true);
        echo "</title>
    <link rel=\"icon\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["favicon"] ?? null), "html", null, true);
        echo "\" />
    <link href=\"";
        // line 10
        echo $this->extensions['Cms\Twig\Extension']->themeFilter([0 => "assets/css/bootstrap.min.css", 1 => "assets/vendor/font-awesome/css/font-awesome.min.css", 2 => "assets/vendor/owl-carousel/owl.carousel.tabs.css", 3 => "assets/vendor/owl-carousel/owl.transitions.css", 4 => "assets/vendor/owl-carousel/owl.carousel.css", 5 => "assets/css/mb_setting.css", 6 => "assets/vendor/animate/animate.min.css", 7 => "assets/css/stylesheet.css"]);
        // line 18
        echo "\" rel=\"stylesheet\" media=\"screen\"/>
    ";
        // line 19
        echo $this->env->getExtension('Cms\Twig\Extension')->assetsFunction('css');
        echo $this->env->getExtension('Cms\Twig\Extension')->displayBlock('styles');
        // line 20
        echo "    <script src=\"";
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/js/jquery-2.1.1.min.js");
        echo "\" type=\"text/javascript\"></script>";
    }

    public function getTemplateName()
    {
        return "M:\\DATA\\octobertn/themes/toannang/partials/meta.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 20,  69 => 19,  66 => 18,  64 => 10,  60 => 9,  56 => 8,  52 => 7,  48 => 6,  44 => 5,  40 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\"/>
    <meta name=\"description\" content=\"{{ this.page.meta_description }}\">
    <meta name=\"keywords\" content=\"{{ this.page.meta_keywords }}\">
    <meta name=\"title\" content=\"{{ this.page.meta_title }}\">
    <meta name=\"author\" content=\"{{ this.page.meta_author }}\">
    <title>{{ this.page.meta_title }}</title>
    <link rel=\"icon\" href=\"{{ favicon }}\" />
    <link href=\"{{ ['assets/css/bootstrap.min.css',
            'assets/vendor/font-awesome/css/font-awesome.min.css',
            'assets/vendor/owl-carousel/owl.carousel.tabs.css',
            'assets/vendor/owl-carousel/owl.transitions.css',
            'assets/vendor/owl-carousel/owl.carousel.css',
            'assets/css/mb_setting.css',
            'assets/vendor/animate/animate.min.css',
            'assets/css/stylesheet.css'
            ]|theme }}\" rel=\"stylesheet\" media=\"screen\"/>
    {% styles %}
    <script src=\"{{ 'assets/js/jquery-2.1.1.min.js'|theme }}\" type=\"text/javascript\"></script>", "M:\\DATA\\octobertn/themes/toannang/partials/meta.htm", "");
    }
}
