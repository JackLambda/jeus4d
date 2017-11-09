<?php

/* default/index.html.twig */
class __TwigTemplate_111f8ae742ce704379ba4934593f4abb8dffbad6c1ae2f0303ddfe1779f37c28 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
<head>
    <title>Sidebar4</title>
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\"
          href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css\">
</head>

";
        // line 13
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 14
            echo "
<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-md-3 col-sm-4 sidebar3\">

            <div class=\"logo\">
                <img src=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/user/userpp.png"), "html", null, true);
            echo "\" class=\"img-fluid\" alt=\"Logo\" style=\"max-width: 80px;\">
            </div>
            <div class=\"name\">
                    <p>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "user", array()), "username", array()), "html", null, true);
            echo "</p>
                <p></p>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-md-3 col-sm-4 sidebar3\">
            <div class=\"left-navigation\">
                <ul>
                    <li class=\"text-left\"><i class=\"fa fa-plus\" aria-hidden=\"true\"></i><a href=\"";
            // line 32
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_jouer_nouvellepartie");
            echo "\">Nouvelle partie</a></li>
                    <li class=\"text-left\"><i class=\"fa fa-bookmark-o\" aria-hidden=\"true\"></i><a href=\"";
            // line 33
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("app_joueur_mesparties");
            echo "\">Vos parties en cours</a></li>
                    <li class=\"text-left\"><i class=\"fa fa-book\" aria-hidden=\"true\"></i><a href=\"https://drive.google.com/file/d/1PR7GgSX5pVTkSddp4zwofMvOo7QVVKx4/view\">Découvrir les règles</a></li>
                </ul>
                <ul>
                    <li class=\"text-left\"><i class=\"fa fa-power-off\" aria-hidden=\"true\"></i><a href=\"";
            // line 37
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_logout");
            echo "\">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
        <div class=\"col-md-8 main-content\">
            <!--<p>Refer comment section below, to understand how the dropdown menu works using a one-line Jquery</p>-->
        </div>

    </div>
</div>

";
        } else {
            // line 49
            echo "
<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-md-3 col-sm-4 sidebar3\">

            <div class=\"logo\">
                <img src=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/user/userpp.png"), "html", null, true);
            echo "\" class=\"img-fluid\" alt=\"Logo\" style=\"max-width: 80px;\">
            </div>
            <div class=\"name\">
                    <p>Guest</p>
                <p></p>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-md-3 col-sm-4 sidebar3\">
            <div class=\"left-navigation\">
                <ul>
                        <li class=\"text-left\"><i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i><a href=\"";
            // line 67
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_registration_register");
            echo "\">Se créer un compte</a></li>
                        <li class=\"text-left\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i><a href=\"";
            // line 68
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_login");
            echo "\">Se connecter</a></li>
                </ul>
            </div>
        </div>
        <div class=\"col-md-8 main-content\">
            <!--<p>Refer comment section below, to understand how the dropdown menu works using a one-line Jquery</p>-->
        </div>

    </div>
</div>
";
        }
        // line 79
        echo "
";
    }

    // line 82
    public function block_title($context, array $blocks = array())
    {
        echo "Première page";
    }

    // line 83
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 83,  142 => 82,  137 => 79,  123 => 68,  119 => 67,  104 => 55,  96 => 49,  81 => 37,  74 => 33,  70 => 32,  58 => 23,  52 => 20,  44 => 14,  42 => 13,  33 => 6,  30 => 5,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "default/index.html.twig", "/Applications/MAMP/htdocs/s4dsave911/app/Resources/views/default/index.html.twig");
    }
}
