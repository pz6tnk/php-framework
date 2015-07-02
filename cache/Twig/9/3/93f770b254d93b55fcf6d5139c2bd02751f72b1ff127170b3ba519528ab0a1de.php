<?php

/* html/skeleton.twig */
class __TwigTemplate_93f770b254d93b55fcf6d5139c2bd02751f72b1ff127170b3ba519528ab0a1de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html xmlns:t4=\"http://www.w3.org/1999/html\">
<head>
    <meta charset=\"utf-8\">
    ";
        // line 5
        $this->displayBlock('head', $context, $blocks);
        // line 9
        echo "</head>
<body>
<div id=\"content\">

    <div class=\"container\">
        <div class=\"col-md-10 col-md-offset-1\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <div class=\"panel-body\">
                        ";
        // line 18
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div id=\"footer\">
    ";
        // line 27
        $this->displayBlock('footer', $context, $blocks);
        // line 30
        echo "</div>
</body>
</html>";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->loadTemplate("html/css.twig", "html/skeleton.twig", 6)->display($context);
        // line 7
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo " - My Webpage</title>
    ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
    }

    // line 27
    public function block_footer($context, array $blocks = array())
    {
        // line 28
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "html/skeleton.twig";
    }

    public function getDebugInfo()
    {
        return array (  87 => 28,  84 => 27,  79 => 18,  68 => 7,  65 => 6,  62 => 5,  56 => 30,  54 => 27,  42 => 18,  31 => 9,  29 => 5,  23 => 1,);
    }
}
