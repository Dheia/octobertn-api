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

/* D:\Works\Laravel\revolutionclothing/plugins/rainlab/pages/components/staticpage/default.htm */
class __TwigTemplate_ee7f5dfba3738fcbfe74b9a57c6fe9b76f247a4d2216d745d30b7dd0932dcfac extends \Twig\Template
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
        echo twig_get_attribute($this->env, $this->source, ($context["__SELF__"] ?? null), "content", [], "any", false, false, false, 1);
    }

    public function getTemplateName()
    {
        return "D:\\Works\\Laravel\\revolutionclothing/plugins/rainlab/pages/components/staticpage/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ __SELF__.content|raw }}", "D:\\Works\\Laravel\\revolutionclothing/plugins/rainlab/pages/components/staticpage/default.htm", "");
    }
}
