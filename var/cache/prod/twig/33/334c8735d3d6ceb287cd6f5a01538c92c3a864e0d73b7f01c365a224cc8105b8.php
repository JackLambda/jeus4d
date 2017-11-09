<?php

/* @FOSUser/Security/login_content.html.twig */
class __TwigTemplate_6991baa635465b1a089f34a88285d881be4d4c47b17f69568e65aef5c19d99a0 extends Twig_Template
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
        // line 2
        echo "
<div class=\"container-fluid\">

        <section class=\"login-block\">
            <div class=\"\">
                <div class=\"row\">
                    <div class=\"col-md-4 login-sec container\" style=\"float: none; margin: 0 auto;\">
                        <h2 class=\"text-center\">Connexion</h2>
                        <form class=\"login-form\" action=\"";
        // line 10
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_security_check");
        echo "\" method=\"post\">
                            ";
        // line 11
        if (($context["csrf_token"] ?? null)) {
            // line 12
            echo "                                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            echo twig_escape_filter($this->env, ($context["csrf_token"] ?? null), "html", null, true);
            echo "\"/>
                            ";
        }
        // line 14
        echo "                            <div class=\"form-group\">
                                <label style=\"color: black;\" for=\"username\">";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Nom de compte", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                                <input class=\"form-control\" type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\"
                                       required=\"required\"/>

                            </div>
                            <div class=\"form-group\">
                                <label style=\"color: black;\" for=\"password\">";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Mot de passe", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                                <input class=\"form-control\" type=\"password\" id=\"password\" name=\"_password\" required=\"required\"/>
                            </div>


                            <div class=\"form-check\">
                                <label class=\"form-check-label\">
                                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"on\"/>
                                    <label style=\"color: black;\" for=\"remember_me\">";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Se souvenir de moi", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                                </label>
                                <input class=\"btn btn-login float-right\" type=\"submit\" id=\"_submit\" name=\"_submit\" value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Se connecter", array(), "FOSUserBundle"), "html", null, true);
        echo "\"/>
                            </div>

                        </form>
                        <br>
                        <div style=\"color: black; font-size: 0.8em;\">Pas encore inscrit ? <a href=\"";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_user_registration_register");
        echo "\"><input class=\"btn btn-login\" type=\"button\" value=\"s'inscrire\"></div>
                    </div>
                    </div>

                    </div>
                </div>
        </section>

    </div>
";
    }

    public function getTemplateName()
    {
        return "@FOSUser/Security/login_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 36,  72 => 31,  67 => 29,  56 => 21,  48 => 16,  44 => 15,  41 => 14,  35 => 12,  33 => 11,  29 => 10,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@FOSUser/Security/login_content.html.twig", "/Applications/MAMP/htdocs/s4dsave911/app/Resources/FOSUserBundle/views/Security/login_content.html.twig");
    }
}
