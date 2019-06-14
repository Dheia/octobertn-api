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

/* D:\Works\Laravel\revolutionclothing/plugins/excodus/translateextended/components/extendedlocalepicker/default.htm */
class __TwigTemplate_ad74d40af5593e631a6de2453fb35228ea4a59fa0f4975df62e0eb75ebe9f0e6 extends \Twig\Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
        foreach ($context['_seq'] as $context["code"] => $context["name"]) {
            // line 2
            echo "    <a class=\"text-uppercase\" href=\"";
            echo $this->extensions['System\Twig\Extension']->appFilter("");
            echo twig_escape_filter($this->env, (("/" . $context["code"]) . (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["localeLinks"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["code"]] ?? null) : null)), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["code"], "html", null, true);
            echo "</a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "D:\\Works\\Laravel\\revolutionclothing/plugins/excodus/translateextended/components/extendedlocalepicker/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for code, name in locales %}
    <a class=\"text-uppercase\" href=\"{{''|app}}{{ '/' ~ code ~ localeLinks[code] }}\">{{ code }}</a>
{% endfor %}", "D:\\Works\\Laravel\\revolutionclothing/plugins/excodus/translateextended/components/extendedlocalepicker/default.htm", "");
    }
}
