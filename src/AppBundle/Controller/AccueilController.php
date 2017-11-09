<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AccueilController extends Controller
{
    /**
     * @Route("/RecupUser")
     */
    public function RecupUserAction()
    {
        return $this->render('AppBundle:Accueil:recup_user.html.twig', array(
            // ...
        ));
    }

}
