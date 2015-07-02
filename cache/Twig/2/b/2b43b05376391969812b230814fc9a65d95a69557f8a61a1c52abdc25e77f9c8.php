<?php

/* articles/all.php */
class __TwigTemplate_2b43b05376391969812b230814fc9a65d95a69557f8a61a1c52abdc25e77f9c8 extends Twig_Template
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
        echo "<?php

foreach (\$articles as \$article) {
    echo \"<h2>\" . \$article->title . \"</h2>\";
    echo \"<p>\" . \$article->body . \"</p>\";
}

";
    }

    public function getTemplateName()
    {
        return "articles/all.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
