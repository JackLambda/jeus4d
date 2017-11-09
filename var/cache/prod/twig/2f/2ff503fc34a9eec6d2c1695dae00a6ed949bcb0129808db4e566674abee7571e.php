<?php

/* default/index.html.twig */
class __TwigTemplate_65e594bbc3523f403b293c0f7fa9a0500bb420e29756ee785793cbbb09164362 extends Twig_Template
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
        $__internal_944dda2f5109a9452bb41ff9a032d3d6944559ba823ac579d305e5688f422ead = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_944dda2f5109a9452bb41ff9a032d3d6944559ba823ac579d305e5688f422ead->enter($__internal_944dda2f5109a9452bb41ff9a032d3d6944559ba823ac579d305e5688f422ead_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_944dda2f5109a9452bb41ff9a032d3d6944559ba823ac579d305e5688f422ead->leave($__internal_944dda2f5109a9452bb41ff9a032d3d6944559ba823ac579d305e5688f422ead_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_eba8d49f814e5b651e6bd12dae71f2229eaf219acbb2a9067d0d234b9cb44ff7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_eba8d49f814e5b651e6bd12dae71f2229eaf219acbb2a9067d0d234b9cb44ff7->enter($__internal_eba8d49f814e5b651e6bd12dae71f2229eaf219acbb2a9067d0d234b9cb44ff7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

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
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
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
        
        $__internal_eba8d49f814e5b651e6bd12dae71f2229eaf219acbb2a9067d0d234b9cb44ff7->leave($__internal_eba8d49f814e5b651e6bd12dae71f2229eaf219acbb2a9067d0d234b9cb44ff7_prof);

    }

    // line 82
    public function block_title($context, array $blocks = array())
    {
        $__internal_c60b0c508e05557363c2484b4fccb4a46483ac0faaedd503803f5b722b3aa935 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c60b0c508e05557363c2484b4fccb4a46483ac0faaedd503803f5b722b3aa935->enter($__internal_c60b0c508e05557363c2484b4fccb4a46483ac0faaedd503803f5b722b3aa935_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Première page";
        
        $__internal_c60b0c508e05557363c2484b4fccb4a46483ac0faaedd503803f5b722b3aa935->leave($__internal_c60b0c508e05557363c2484b4fccb4a46483ac0faaedd503803f5b722b3aa935_prof);

    }

    // line 83
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_b580aff31ff293a86f7d87e4d691cfb5d6056a70cec7d067d24d1a2da2ee37cf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b580aff31ff293a86f7d87e4d691cfb5d6056a70cec7d067d24d1a2da2ee37cf->enter($__internal_b580aff31ff293a86f7d87e4d691cfb5d6056a70cec7d067d24d1a2da2ee37cf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_b580aff31ff293a86f7d87e4d691cfb5d6056a70cec7d067d24d1a2da2ee37cf->leave($__internal_b580aff31ff293a86f7d87e4d691cfb5d6056a70cec7d067d24d1a2da2ee37cf_prof);

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
        return array (  166 => 83,  154 => 82,  146 => 79,  132 => 68,  128 => 67,  113 => 55,  105 => 49,  90 => 37,  83 => 33,  79 => 32,  67 => 23,  61 => 20,  53 => 14,  51 => 13,  42 => 6,  36 => 5,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}



{% block body %}

<head>
    <title>Sidebar4</title>
    <link media=\"all\" type=\"text/css\" rel=\"stylesheet\"
          href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css\">
</head>

{% if is_granted('IS_AUTHENTICATED_FULLY') %}

<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-md-3 col-sm-4 sidebar3\">

            <div class=\"logo\">
                <img src=\"{{ asset('images/user/userpp.png') }}\" class=\"img-fluid\" alt=\"Logo\" style=\"max-width: 80px;\">
            </div>
            <div class=\"name\">
                    <p>{{ app.user.username }}</p>
                <p></p>
            </div>
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-md-3 col-sm-4 sidebar3\">
            <div class=\"left-navigation\">
                <ul>
                    <li class=\"text-left\"><i class=\"fa fa-plus\" aria-hidden=\"true\"></i><a href=\"{{ path('app_jouer_nouvellepartie') }}\">Nouvelle partie</a></li>
                    <li class=\"text-left\"><i class=\"fa fa-bookmark-o\" aria-hidden=\"true\"></i><a href=\"{{ path('app_joueur_mesparties') }}\">Vos parties en cours</a></li>
                    <li class=\"text-left\"><i class=\"fa fa-book\" aria-hidden=\"true\"></i><a href=\"https://drive.google.com/file/d/1PR7GgSX5pVTkSddp4zwofMvOo7QVVKx4/view\">Découvrir les règles</a></li>
                </ul>
                <ul>
                    <li class=\"text-left\"><i class=\"fa fa-power-off\" aria-hidden=\"true\"></i><a href=\"{{ path('fos_user_security_logout') }}\">Se déconnecter</a></li>
                </ul>
            </div>
        </div>
        <div class=\"col-md-8 main-content\">
            <!--<p>Refer comment section below, to understand how the dropdown menu works using a one-line Jquery</p>-->
        </div>

    </div>
</div>

{% else %}

<div class=\"container-fluid\">
    <div class=\"row\">
        <div class=\"col-md-3 col-sm-4 sidebar3\">

            <div class=\"logo\">
                <img src=\"{{ asset('images/user/userpp.png') }}\" class=\"img-fluid\" alt=\"Logo\" style=\"max-width: 80px;\">
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
                        <li class=\"text-left\"><i class=\"fa fa-user-plus\" aria-hidden=\"true\"></i><a href=\"{{ path('fos_user_registration_register') }}\">Se créer un compte</a></li>
                        <li class=\"text-left\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i><a href=\"{{ path('fos_user_security_login') }}\">Se connecter</a></li>
                </ul>
            </div>
        </div>
        <div class=\"col-md-8 main-content\">
            <!--<p>Refer comment section below, to understand how the dropdown menu works using a one-line Jquery</p>-->
        </div>

    </div>
</div>
{% endif %}

{% endblock %}

{% block title %}Première page{% endblock %}
        {% block stylesheets %}{% endblock %}

", "default/index.html.twig", "/Applications/MAMP/htdocs/s4dsave911/app/Resources/views/default/index.html.twig");
    }
}
