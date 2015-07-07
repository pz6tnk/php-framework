<?php

/* html/css.twig */
class __TwigTemplate_56d83de02c7d2d0c7eeef67ef06538cdf9ca640705eff5c140eb40868b6cca3c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo call_user_func_array($this->env->getFunction('addCss')->getCallable(), array());
    }

    public function getTemplateName()
    {
        return "html/css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
