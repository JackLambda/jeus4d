<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class JoueurController extends Controller
{
    /**
     * @Route("/mesparties")
     */
    public function mespartiesAction()
    {

        $id = $this->getUser()->getId();

        $partieJ1 = $this->getDoctrine()->getRepository('AppBundle:Partie')->findBy(array('joueur1' => $id));

        $partieJ2 = $this->getDoctrine()->getRepository('AppBundle:Partie')->findBy(array('joueur2' => $id));

        return $this->render('AppBundle:Joueur:mesparties.html.twig', array(
            'partieJ1' => $partieJ1,
            'partieJ2' => $partieJ2,
            'user' => $id
        ));
    }

}
