<?php

/* base.html.twig */
class __TwigTemplate_5f00b5931b33cdd5606ebce15f80504bd16268c2597c23092d8fe6c29aaeefc3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_2fae69765fb063d8f019455796b54a857ea38e38a5cb7ef86382c898c3cd698e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2fae69765fb063d8f019455796b54a857ea38e38a5cb7ef86382c898c3cd698e->enter($__internal_2fae69765fb063d8f019455796b54a857ea38e38a5cb7ef86382c898c3cd698e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/bootstrap-grid.min.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-ui-1.12.1/jquery-ui.min.css"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/custom.css"), "html", null, true);
        echo "\">
        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>



    <nav class=\"navbar navbar-default\">
        <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <a class=\"navbar-brand\" href=\"";
        // line 21
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("homepage");
        echo "\">Rob in Wood</a>
            </div>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

    </nav>



    <div class=\"container-fluid\">
        ";
        // line 31
        $this->displayBlock('body', $context, $blocks);
        // line 32
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 33
        echo "    </div>
        <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-3.2.1.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-ui-1.12.1/jquery-ui.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/custom.js"), "html", null, true);
        echo "\"></script>
        ";
        // line 38
        $this->displayBlock('javascripts', $context, $blocks);
        // line 39
        echo "    </body>
</html>
";
        
        $__internal_2fae69765fb063d8f019455796b54a857ea38e38a5cb7ef86382c898c3cd698e->leave($__internal_2fae69765fb063d8f019455796b54a857ea38e38a5cb7ef86382c898c3cd698e_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_e10eeb479c6af52acb29c1359fb0fbe1590cf864c44fba4f88cc6f7299c3ecc0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e10eeb479c6af52acb29c1359fb0fbe1590cf864c44fba4f88cc6f7299c3ecc0->enter($__internal_e10eeb479c6af52acb29c1359fb0fbe1590cf864c44fba4f88cc6f7299c3ecc0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_e10eeb479c6af52acb29c1359fb0fbe1590cf864c44fba4f88cc6f7299c3ecc0->leave($__internal_e10eeb479c6af52acb29c1359fb0fbe1590cf864c44fba4f88cc6f7299c3ecc0_prof);

    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_7a1de8aa30faa00fe814525fdb9772dfce566062b23518745cdf17be346d8609 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7a1de8aa30faa00fe814525fdb9772dfce566062b23518745cdf17be346d8609->enter($__internal_7a1de8aa30faa00fe814525fdb9772dfce566062b23518745cdf17be346d8609_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_7a1de8aa30faa00fe814525fdb9772dfce566062b23518745cdf17be346d8609->leave($__internal_7a1de8aa30faa00fe814525fdb9772dfce566062b23518745cdf17be346d8609_prof);

    }

    // line 31
    public function block_body($context, array $blocks = array())
    {
        $__internal_3be3a7abbb7b2558bf57155d2b3f5a36d01235915de24b81c110d77ad5214bf2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3be3a7abbb7b2558bf57155d2b3f5a36d01235915de24b81c110d77ad5214bf2->enter($__internal_3be3a7abbb7b2558bf57155d2b3f5a36d01235915de24b81c110d77ad5214bf2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_3be3a7abbb7b2558bf57155d2b3f5a36d01235915de24b81c110d77ad5214bf2->leave($__internal_3be3a7abbb7b2558bf57155d2b3f5a36d01235915de24b81c110d77ad5214bf2_prof);

    }

    // line 32
    public function block_content($context, array $blocks = array())
    {
        $__internal_af590f7965bb111414f85a16f2388fe7a3840dfa8c036fea84e05900656b9a3a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_af590f7965bb111414f85a16f2388fe7a3840dfa8c036fea84e05900656b9a3a->enter($__internal_af590f7965bb111414f85a16f2388fe7a3840dfa8c036fea84e05900656b9a3a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_af590f7965bb111414f85a16f2388fe7a3840dfa8c036fea84e05900656b9a3a->leave($__internal_af590f7965bb111414f85a16f2388fe7a3840dfa8c036fea84e05900656b9a3a_prof);

    }

    // line 38
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_23016dab8caebb9fe910d9c807907874aff425c1a5dca91adaf1b588499f4178 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_23016dab8caebb9fe910d9c807907874aff425c1a5dca91adaf1b588499f4178->enter($__internal_23016dab8caebb9fe910d9c807907874aff425c1a5dca91adaf1b588499f4178_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_23016dab8caebb9fe910d9c807907874aff425c1a5dca91adaf1b588499f4178->leave($__internal_23016dab8caebb9fe910d9c807907874aff425c1a5dca91adaf1b588499f4178_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 38,  151 => 32,  140 => 31,  129 => 10,  117 => 5,  108 => 39,  106 => 38,  102 => 37,  98 => 36,  94 => 35,  90 => 34,  87 => 33,  84 => 32,  82 => 31,  69 => 21,  55 => 11,  53 => 10,  49 => 9,  45 => 8,  41 => 7,  37 => 6,  33 => 5,  27 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.min.css') }}\" />
        <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap-grid.min.css') }}\" />
        <link rel=\"stylesheet\" href=\"{{ asset('js/jquery-ui-1.12.1/jquery-ui.min.css') }}\" />
        <link rel=\"stylesheet\" href=\"{{ asset('css/custom.css') }}\">
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>



    <nav class=\"navbar navbar-default\">
        <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <a class=\"navbar-brand\" href=\"{{ path('homepage') }}\">Rob in Wood</a>
            </div>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

    </nav>



    <div class=\"container-fluid\">
        {% block body %}{% endblock %}
        {% block content %}{% endblock %}
    </div>
        <script src=\"{{ asset('js/jquery-3.2.1.min.js') }}\"></script>
        <script src=\"{{ asset('js/bootstrap.min.js') }}\"></script>
        <script src=\"{{ asset('js/jquery-ui-1.12.1/jquery-ui.js') }}\"></script>
        <script src=\"{{ asset('js/custom.js') }}\"></script>
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/Applications/MAMP/htdocs/s4dsave911/app/Resources/views/base.html.twig");
    }
}
