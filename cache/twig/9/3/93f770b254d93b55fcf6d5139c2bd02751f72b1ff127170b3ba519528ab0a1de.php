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
<div class=\"navbar navbar-inverse\">
    <div class=\"navbar-inner\">
        <div class=\"container\">
            <div class=\"col-md-10 col-md-offset-1\">
                <ul class=\"nav\">
                    <li class=\"active\"><a href=\"/\">Home</a></li>
                    <li><a href=\"/articles/all\">Articles</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id=\"content\">
    <div class=\"container\">
        <div class=\"col-md-10 col-md-offset-1\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <div class=\"panel-body\">
                        ";
        // line 30
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div id=\"footer\">
    ";
        // line 39
        $this->displayBlock('footer', $context, $blocks);
        // line 42
        echo "</div>
</body>
</html>";
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        echo call_user_func_array($this->env->getFunction('addCss')->getCallable(), array());
        echo "
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "php - framework</title>
    ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 30
    public function block_content($context, array $blocks = array())
    {
    }

    // line 39
    public function block_footer($context, array $blocks = array())
    {
        // line 40
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "html/skeleton.twig";
    }

    public function getDebugInfo()
    {
        return array (  100 => 40,  97 => 39,  92 => 30,  82 => 7,  77 => 6,  74 => 5,  68 => 42,  66 => 39,  54 => 30,  31 => 9,  29 => 5,  23 => 1,);
    }
}
