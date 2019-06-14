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

/* M:\DATA\octobertn/plugins/toannang/componentbuilder/components/lamrevolutionclothingslider/default.htm */
class __TwigTemplate_df7ef0fd36320896b72e3dc6aad06eee2206b8ca203b85cd44abb41fc962b5c0 extends \Twig\Template
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
        if (($context["home_sliders"] ?? null)) {
            // line 2
            echo "<div class=\"custom-top slick-slider\" id=\"custom_slider\">
    ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["home_sliders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["slide"]) {
                // line 4
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slide"], "link", [], "any", false, false, false, 4), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slide"], "name", [], "any", false, false, false, 4), "html", null, true);
                echo "\">
        <img src=\"";
                // line 5
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["slide"], "image", [], "any", false, false, false, 5), "html", null, true);
                echo "\" alt=\"\" class=\"img-responsive\">
    </a>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slide'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "M:\\DATA\\octobertn/plugins/toannang/componentbuilder/components/lamrevolutionclothingslider/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 8,  51 => 5,  44 => 4,  40 => 3,  37 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if(home_sliders) %}
<div class=\"custom-top slick-slider\" id=\"custom_slider\">
    {% for slide in home_sliders %}
    <a href=\"{{ slide.link }}\" title=\"{{ slide.name }}\">
        <img src=\"{{ slide.image }}\" alt=\"\" class=\"img-responsive\">
    </a>
    {% endfor %}
</div>
{% endif %}", "M:\\DATA\\octobertn/plugins/toannang/componentbuilder/components/lamrevolutionclothingslider/default.htm", "");
    }
}
