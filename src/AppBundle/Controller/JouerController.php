<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Borne;
use AppBundle\Entity\Carte;
use AppBundle\Entity\Partie;
use AppBundle\Form\PartieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncode;

/**
 * Class JouerController
 * @package AppBundle\Controller
 * @Route("/jouer")
 */
class JouerController extends Controller
{
    /**
     * @Route("/nouvelle-partie")
     */
    public function nouvellePartieAction(Request $request)
    {
        $partie = new Partie();
        $form = $this->createForm(PartieType::class, $partie);

        $form->handleRequest($request); //synchronisation des données du formulaire avec l'objet $partie via le formType
        if ($form->isSubmitted() && $form->isValid())
        {
            //récupére la connexion à la BDD
            $em = $this->getDoctrine()->getManager();

            // initialisation des données de la partie

            //récupération de toutes les bornes
            $bornes = $em->getRepository("AppBundle:Borne")->findAll();

            $tborne=array(); //tableau qui sera sauvegardé dans la BDD
            $ordre = 1; //ordre des bornes
            foreach ($bornes as $borne)
            {
                $tborne[$ordre] = array('id_borne' => $borne->getId(),
                                        'position' => 'neutre',
                                        'winJ1' => 'victoireJ1',
                                        'winJ2' => 'victoireJ2',
                    );
                $ordre ++;
            }
            //sauvegarde la liste des bornes dans ma partie
            $partie->setListeDesBornes($tborne);

            $cartes = $em->getRepository('AppBundle:Carte')->findAll();
            $tcarte = array();
            foreach ($cartes as $carte)
            {
                $tcarte[] = $carte->getId(); //sauvegarde les id des cartes dans un tableau
            }

            shuffle($tcarte); //mélange du tableau

            //distribution de la main de J1
            $mainJ1=array();
            for($i = 0; $i<6; $i++)
            {
                $mainJ1[] = $tcarte[$i];
            }
            $partie->setMainj1($mainJ1);

            //distributoon de la main de J2
            $mainJ2=array();
            for($i = 6; $i<12; $i++)
            {
                $mainJ2[] = $tcarte[$i];
            }
            $partie->setMainj2($mainJ2);

            $pioche=array();
            for($i = 12; $i < count($tcarte); $i++)
            {
                $pioche[] = $tcarte[$i];
            }
            $partie->setPioche($pioche);

            $partie->setTourJoueur($partie->getJoueur1());

            $terrain = array(
                'col1' => array(0,0,0),
                'col2' => array(0,0,0),
                'col3' => array(0,0,0),
                'col4' => array(0,0,0),
                'col5' => array(0,0,0),
                'col6' => array(0,0,0),
                'col7' => array(0,0,0),
                'col8' => array(0,0,0),
                'col9' => array(0,0,0)
                );
            $partie->setTerrainj1($terrain);
            $partie->setTerrainj2($terrain);

            $em->persist($partie);
            $em->flush();

            // redirection vers la distribution des cartes
            return $this->redirectToRoute("afficher_plateau", array('partie' => $partie->getId()) );
        }

        return $this->render(':JouerController:nouvelle_partie.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/afficher/{partie}", name="afficher_plateau")
     */
    public function afficherPlateauAction(Partie $partie)
    {
        // Afficher le plateau

        //récupérer cartes et bornes
        $em = $this->getDoctrine()->getManager();
        $cartes = $em->getRepository('AppBundle:Carte')->findAll();
        $bornes = $em->getRepository('AppBundle:Borne')->findAll();

        //construction d'un tableau d'ibjet carte dont l'index est id
        $tcartes = array();
        foreach ($cartes as $carte)
        {
            $tcartes[$carte->getId()] = $carte;
        }

        $tbornes = array();
        foreach ($bornes as $borne)
        {
            $tbornes[$borne->getId()] = $borne;
        }


        $montour = false;

        if ($this->getUser()->getId() == $partie->getTourJoueur()->getId())
        {
            $montour = true;
            if ($partie->getTourJoueur()->getId() == $partie->getJoueur1()->getId())
            {
                //c'est le joueur 1
                $nomadversaire = 'j2';
                $nomencours = 'j1';
                $adversaire = $partie->getJoueur2();
                $mainencours = $partie->getMainj1();
                $terrainencours = $partie->getTerrainj1();
                $terrainadversaire = $partie->getTerrainj2();
            } else
            {
                //c'est le joueur 2
                $nomadversaire = 'j1';
                $nomencours = 'j2';
                $adversaire = $partie->getJoueur1();
                $mainencours = $partie->getMainj2();
                $terrainencours = $partie->getTerrainj2();
                $terrainadversaire = $partie->getTerrainj1();
            }

        } else
        {
            $montour = false; //ce n'est pas mon tour de jeu
            if ($this->getUser()->getId() == $partie->getJoueur1()->getId())
            {
                //c'est le joueur 1
                $nomadversaire = 'j2';
                $nomencours = 'j1';
                $adversaire = $partie->getJoueur2();
                $mainencours = $partie->getMainj1();
                $terrainencours = $partie->getTerrainj1();
                $terrainadversaire = $partie->getTerrainj2();
            } else
            {
                //c'est le joueur 2
                $nomadversaire = 'j1';
                $nomencours = 'j2';
                $adversaire = $partie->getJoueur1();
                $mainencours = $partie->getMainj2();
                $terrainencours = $partie->getTerrainj2();
                $terrainadversaire = $partie->getTerrainj1();
            }
        }


        return $this->render(':JouerController:afficher_plateau.html.twig', array(
            'partie' => $partie,
            'tcartes' => $tcartes,
            'tbornes' => $tbornes,
            'mainencours' => $mainencours,
            'terrainencours' => $terrainencours,
            'terrainadversaire' => $terrainadversaire,
            'adversaire' => $adversaire,
            'user'=> $this->getUser(),
            'montour' => $montour,
            'nomadversaire' => $nomadversaire,
            'nomencours' => $nomencours
        ));
    }

    /**
     * @Route("/afficher2/{partie}", name="afficher_plateau2")
     */
    public function afficherPlateau2Action(Partie $partie)
    {
        // Afficher le plateau

        //récupérer cartes et bornes
        $em = $this->getDoctrine()->getManager();
        $cartes = $em->getRepository('AppBundle:Carte')->findAll();
        $bornes = $em->getRepository('AppBundle:Borne')->findAll();

        //construction d'un tableau d'ibjet carte dont l'index est id
        $tcartes = array();
        foreach ($cartes as $carte)
        {
            $tcartes[$carte->getId()] = $carte;
        }

        $tbornes = array();
        foreach ($bornes as $borne)
        {
            $tbornes[$borne->getId()] = $borne;
        }


        $montour = false;

        if ($this->getUser()->getId() == $partie->getTourJoueur()->getId())
        {
            $montour = true;
            if ($partie->getTourJoueur()->getId() == $partie->getJoueur1()->getId())
            {
                //c'est le joueur 1
                $nomadversaire = 'j2';
                $nomencours = 'j1';
                $adversaire = $partie->getJoueur2();
                $mainencours = $partie->getMainj1();
                $terrainencours = $partie->getTerrainj1();
                $terrainadversaire = $partie->getTerrainj2();
            } else
            {
                //c'est le joueur 2
                $nomadversaire = 'j1';
                $nomencours = 'j2';
                $adversaire = $partie->getJoueur1();
                $mainencours = $partie->getMainj2();
                $terrainencours = $partie->getTerrainj2();
                $terrainadversaire = $partie->getTerrainj1();
            }

        } else
        {
            $montour = false; //ce n'est pas mon tour de jeu
            if ($this->getUser()->getId() == $partie->getJoueur1()->getId())
            {
                //c'est le joueur 1
                $nomadversaire = 'j2';
                $nomencours = 'j1';
                $adversaire = $partie->getJoueur2();
                $mainencours = $partie->getMainj1();
                $terrainencours = $partie->getTerrainj1();
                $terrainadversaire = $partie->getTerrainj2();
            } else
            {
                //c'est le joueur 2
                $nomadversaire = 'j1';
                $nomencours = 'j2';
                $adversaire = $partie->getJoueur1();
                $mainencours = $partie->getMainj2();
                $terrainencours = $partie->getTerrainj2();
                $terrainadversaire = $partie->getTerrainj1();
            }
        }


        return $this->render(':JouerController:afficher_plateau2.html.twig', array(
            'partie' => $partie,
            'tcartes' => $tcartes,
            'tbornes' => $tbornes,
            'mainencours' => $mainencours,
            'terrainencours' => $terrainencours,
            'terrainadversaire' => $terrainadversaire,
            'adversaire' => $adversaire,
            'user'=> $this->getUser(),
            'montour' => $montour,
            'nomadversaire' => $nomadversaire,
            'nomencours' => $nomencours
        ));
    }

    /**
     * @Route("/ajax/jouercarte", name="jouer_carte")
     */
    public function sauvegarderDeplacementAction(Request $request)
    {
        $colonne = $request->request->get('colonne');
        $idcarte = $request->request->get('carte');
        $idpartie = $request->request->get('partie');

        $em = $this->getDoctrine()->getManager();

        $partie = $em->getRepository('AppBundle:Partie')->find($idpartie);

        if ($this->getUser()->getId() == $partie->getJoueur1()->getId()) {
            $terrainJ1 = $partie->getTerrainj1();

            $i = 0;
            $carteplace = false;
            //sauvegarde l'id de la carte dans le terrain du joueur 1.
            while ($carteplace == false) {
                if ($terrainJ1['col' . $colonne][$i] == 0) {
                    //alors la zone est libre
                    $terrainJ1['col' . $colonne][$i] = $idcarte;
                    $carteplace = true;
                }
                $i++;
            }

            $mainj1 = $partie->getMainj1();

            $index = array_search($idcarte, $mainj1);
            unset($mainj1[$index]);
            $mainj1 = array_values($mainj1);

            //Supprimer la carte de la main du joueur.

            $partie->setTerrainj1($terrainJ1);
            $partie->setMainj1($mainj1);
        } else
        {
            $terrainJ2 = $partie->getTerrainj2();

            $i = 0;
            $carteplace = false;
            //sauvegarde l'id de la carte dans le terrain du joueur 1.
            while ($carteplace == false) {
                if ($terrainJ2['col' . $colonne][$i] == 0) {
                    //alors la zone est libre
                    $terrainJ2['col' . $colonne][$i] = $idcarte;
                    $carteplace = true;
                }
                $i++;
            }

            $mainj2 = $partie->getMainj2();

            $index = array_search($idcarte, $mainj2);
            unset($mainj2[$index]);
            $mainj2 = array_values($mainj2);

            //Supprimer la carte de la main du joueur.

            $partie->setTerrainj2($terrainJ2);
            $partie->setMainj2($mainj2);
        }
        $em->persist($partie);
        $em->flush();

        return new Response('ok', 200);
    }

    /**
     * @Route("/piocher/{partie}", name="jouer_piocher")
     */
    public function piocherAction(Request $request, Partie $partie)
    {
        if (count($partie->getMainj1())<6){


            $pioche = $partie->getPioche();
            $carte = $pioche[0];
            unset($pioche[0]);
            $pioche = array_values($pioche);
            $em = $this->getDoctrine()->getManager();
            $partie->setPioche($pioche);
            if ($this->getUser()->getId() == $partie->getJoueur1()->getId()) {
                $mainJ1 = $partie->getMainj1();
                $mainJ1[] = $carte;
                $partie->setMainj1($mainJ1);
                $partie->setTourJoueur($partie->getJoueur2());
            } else
            {
                $mainJ2 = $partie->getMainj2();
                $mainJ2[] = $carte;
                $partie->setMainj2($mainJ2);
                $partie->setTourJoueur($partie->getJoueur1());
            }
            $em->persist($partie);
            $em->flush();
            return $this->redirectToRoute('afficher_plateau', array(
                'partie' => $partie->getId()
            ));
        }


        elseif (count($partie->getMainj2())<6){


            $pioche = $partie->getPioche();
            $carte = $pioche[0];
            unset($pioche[0]);
            $pioche = array_values($pioche);
            $em = $this->getDoctrine()->getManager();
            $partie->setPioche($pioche);
            if ($this->getUser()->getId() == $partie->getJoueur2()->getId()) {
                $mainJ2 = $partie->getMainj2();
                $mainJ2[] = $carte;
                $partie->setMainj2($mainJ2);
                $partie->setTourJoueur($partie->getJoueur1());
            } else
            {
                $mainJ1 = $partie->getMainj1();
                $mainJ1[] = $carte;
                $partie->setMainj1($mainJ2);
                $partie->setTourJoueur($partie->getJoueur2());
            }
            $em->persist($partie);
            $em->flush();
            return $this->redirectToRoute('afficher_plateau', array(
                'partie' => $partie->getId()
            ));
        }


        else {
            return $this->redirectToRoute('afficher_plateau', array(
                'partie' => $partie->getId()
            ));
        }
    }

    /**
     * @Route("/revendiquerBorne/{borne}/{partie}", name="app_jouer_revendiquerborne")
     */
    public function revendiquerBorneAction(Request $request, $borne, Partie $partie)
    {
        $em = $this->getDoctrine()->getManager();

        //REVENDICATION BOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOORNES
        $cartes = $em->getRepository('AppBundle:Carte')->findAll(); // On récupère la totalité des éléments de l'entité Carte dans la variable $cartes
        $tcarte = array(); // On déclare un tableau $tcartes, vide
        foreach ($cartes as $carte) { // Boucle foreach parcourant le tableau $cartes comportant les éléments de l'entité Carte
            $tcarte[$carte->getId()] = $carte;
        }

        //J1
        //$borne++;
        //echo $borne;
        $tj1 = $partie->getTerrainj1(); // Déclaration d'une variable $tj1 comprenant le tableau du terrain du joueur1
        //var_dump($borne);

        $col = $tj1['col' . $borne]; // Déclaration d'une variable $col, équivalent aux bornes de chaque colonne (sous-tableau) du tableau du terrain du Joueur1

        //tri du tableau par ordre croissant
        sort($col); // Tri du tableau par ordre croissant

        //test si 3 cartes coté J1
        if ($col[0] != 0) { // Si le premier emplacement de la colonne est différent de 0 (non vide en somme), alors ->
            if ($col[1] != 0) { // Si le second emplacement de la colonne est différent de 0 (non vide en somme), alors ->
                if ($col[2] != 0) { // Si le troisième emplacement de la colonne est différent de 0 (non vide en somme), alors ->


                    // On va tester la colonne du joueur2
                    $tj2 = $partie->getTerrainj2(); // Déclaration de la variable $tj2 et récupération du tableau du terrain du joueur2
                    $col2 = $tj2['col' . $borne]; // Déclaration de la variable $col2, comprenant les bornes de chaque colonne du tableau du terrain du joueur2

                    //tri du tableau par ordre croissant
                    sort($col2);

                    //test si 3 cartes coté J2
                    if ($col2[0] != 0) {
                        if ($col2[1] != 0) {
                            if ($col2[2] != 0) {


                                //echo $tcarte[$col[0]]->getNumero();

                                //initialistion de la variable à 0
                                $x = 0;

                                //checke brelan
                                if ($tcarte[$col[0]]->getNumero() == $tcarte[$col[1]]->getNumero() && $tcarte[$col[1]]->getNumero() == $tcarte[$col[2]]->getNumero()) {
                                    //brelan ok
                                    $x = 4;
                                } //checke suite
                                elseif ($tcarte[$col[0]]->getNumero() == $tcarte[$col[1]]->getNumero() - 1 && $tcarte[$col[1]]->getNumero() == $tcarte[$col[2]]->getNumero() - 1) {
                                    //checke suite couleur
                                    if ($tcarte[$col[0]]->getCouleur()->getId() == $tcarte[$col[1]]->getCouleur()->getId() && $tcarte[$col[1]]->getCouleur()->getId() == $tcarte[$col[2]]->getCouleur()->getId()) {
                                        //suite couleur ok
                                        $x = 5;
                                    } //suite ok mais pas couleur
                                    else {
                                        $x = 2;
                                    }
                                } //checke couleur
                                elseif ($tcarte[$col[0]]->getCouleur()->getId() == $tcarte[$col[1]]->getCouleur()->getId() && $tcarte[$col[1]]->getCouleur()->getId() == $tcarte[$col[2]]->getCouleur()->getId()) {
                                    //couleur ok
                                    $x = 3;
                                } else {
                                    //somme ok
                                    $x = 1;
                                }


                                //echo $tcarte[$col[0]]->getCouleur()->getId();

                                //initialistion de la variable à 0
                                $y = 0;

                                //checke brelan, test conditionnel pour voir si les trois cartes de la colonne son équivalentes
                                if ($tcarte[$col2[0]]->getNumero() == $tcarte[$col2[1]]->getNumero() && $tcarte[$col2[1]]->getNumero() == $tcarte[$col2[2]]->getNumero()) {
                                    //brelan ok, on attribue un numéro en cas de réussite de ce test conditionnel, ici 4
                                    $y = 4;
                                } //checke suite, test conditionnel pour voir si les trois cartes de la colonne se suivent (test par soustraction consecutive)
                                elseif ($tcarte[$col2[0]]->getNumero() == $tcarte[$col2[1]]->getNumero() - 1 && $tcarte[$col2[1]]->getNumero() == $tcarte[$col2[2]]->getNumero() - 1) {
                                    // Si oui, on test si c'est une suite de couleur, on va donc comparé les champs Couleur de nos éléments
                                    if ($tcarte[$col2[0]]->getCouleur()->getId() == $tcarte[$col2[1]]->getCouleur()->getId() && $tcarte[$col2[1]]->getCouleur()->getId() == $tcarte[$col2[2]]->getCouleur()->getId()) {
                                        //suite couleur ok, on lui attribue un numéro en cas de réussite de ce test conditionnel, ici 5, si non ->
                                        $y = 5;
                                    } // Si non, suite normale, on lui attribue donc un numéro en cas de réussite de ce test conditionnel, ici 2
                                    else {
                                        $y = 2;
                                    }
                                } // Test couleur, on compare donc les champs couleur de nos éléments
                                elseif ($tcarte[$col2[0]]->getCouleur()->getId() == $tcarte[$col2[1]]->getCouleur()->getId() && $tcarte[$col2[1]]->getCouleur()->getId() == $tcarte[$col2[2]]->getCouleur()->getId()) {
                                    //couleur ok, on lui attribue donc un numéro, ici 3
                                    $y = 3;
                                } else { // Sinon, c'est que c'est une somme
                                    //somme ok, on lui attribue donc un numéro, ici 1
                                    $y = 1;
                                }


                                //test gagnant
                                $tb = $partie->getListeDesBornes();

                                //si j1 gagne
                                if ($x > $y) { // x équivaut à la valeur de la "puissance" des cartes de la colonne de J1, et y à la "puissance" des cartes de la colonne de J2
                                    $tb[$borne]['position'] = 'J1'; // On modifie la valeur du champ "position" du tableau des bornes sur J1
                                } //si j2 gagne
                                elseif ($y > $x) {
                                    $tb[$borne]['position'] = 'J2'; // On modifie la valeur du champ "position" du tableau des bornes sur J2
                                } //si 2 suites couleur => somme
                                elseif ($x == $y && $x == 5) {
                                    $a = $tcarte[$col[0]]->getNumero() + $tcarte[$col[1]]->getNumero() + $tcarte[$col[2]]->getNumero();
                                    $c = $tcarte[$col2[0]]->getNumero() + $tcarte[$col2[1]]->getNumero() + $tcarte[$col2[2]]->getNumero();
                                    //si somme j1 >
                                    if ($a > $c) {
                                        $tb[$borne]['position'] = 'J1';
                                    } //si somme j2 >
                                    elseif ($c > $a) {
                                        $tb[$borne]['position'] = 'J2';
                                    } //re-egalité => neutre
                                    else {
                                        $tb[$borne]['position'] = 'neutre';
                                    }
                                } //si 2 brelans => neutre
                                elseif ($x == $y && $x == 4) {
                                    $a2 = $tcarte[$col[0]]->getNumero() + $tcarte[$col[1]]->getNumero() + $tcarte[$col[2]]->getNumero();
                                    $c2 = $tcarte[$col2[0]]->getNumero() + $tcarte[$col2[1]]->getNumero() + $tcarte[$col2[2]]->getNumero();
                                    //si somme j1 >
                                    if ($a2 > $c2) {
                                        $tb[$borne]['position'] = 'J1';
                                    } //si somme j2 >
                                    elseif ($c2 > $a2) {
                                        $tb[$borne]['position'] = 'J2';
                                    } //re-egalité => neutre
                                    else {
                                        $tb[$borne]['position'] = 'neutre';
                                    }
                                } //si 2 suites pas couleur => somme
                                elseif ($x == $y && $x == 2) {
                                    $a3 = $tcarte[$col[0]]->getNumero() + $tcarte[$col[1]]->getNumero() + $tcarte[$col[2]]->getNumero();
                                    $c3 = $tcarte[$col2[0]]->getNumero() + $tcarte[$col2[1]]->getNumero() + $tcarte[$col2[2]]->getNumero();
                                    //si somme j1 >
                                    if ($a3 > $c3) {
                                        $tb[$borne]['position'] = 'J1';
                                    } //si somme j2 >
                                    elseif ($c3 > $a3) {
                                        $tb[$borne]['position'] = 'J2';
                                    } //re-egalité => neutre
                                    else {
                                        $tb[$borne]['position'] = 'neutre';
                                    }
                                } //si 2 couleurs => somme
                                elseif ($x == $y && $x == 3) {
                                    $a = $tcarte[$col[0]]->getNumero() + $tcarte[$col[1]]->getNumero() + $tcarte[$col[2]]->getNumero();
                                    $c = $tcarte[$col2[0]]->getNumero() + $tcarte[$col2[1]]->getNumero() + $tcarte[$col2[2]]->getNumero();
                                    //si somme j1 >
                                    if ($a > $c) {
                                        $tb[$borne]['position'] = 'J1';
                                    } //si somme j2 >
                                    elseif ($c > $a) {
                                        $tb[$borne]['position'] = 'J2';
                                    } //re-egalité => neutre
                                    else {
                                        $tb[$borne]['position'] = 'neutre';
                                    }
                                } //si 2 sommes => somme
                                elseif ($x == $y && $x == 1) {
                                    $a = $tcarte[$col[0]]->getNumero() + $tcarte[$col[1]]->getNumero() + $tcarte[$col[2]]->getNumero();
                                    $c = $tcarte[$col2[0]]->getNumero() + $tcarte[$col2[1]]->getNumero() + $tcarte[$col2[2]]->getNumero();
                                    //si somme j1 >
                                    if ($a > $c) {
                                        $tb[$borne]['position'] = 'J1';
                                    } //si somme j2 >
                                    elseif ($c > $a) {
                                        $tb[$borne]['position'] = 'J2';
                                    } //re-egalité => neutre
                                    else {
                                        $tb[$borne]['position'] = 'neutre';
                                    }
                                }


                                /*echo 'resultat : '. $tb[$borne]['position'];
                                var_dump($borne);
                                var_dump($tj1);
                                var_dump($col[0]);
                                var_dump($col[1]);
                                var_dump($col[2]);
                                var_dump($tcarte);
                                var_dump($tcarte[$col[0]]->getCouleur()->getId());
                                var_dump($tcarte[$col[1]]->getCouleur()->getId());
                                var_dump($tcarte[$col[2]]->getCouleur()->getId());
                                var_dump($tcarte[$col[0]]->getNumero());
                                var_dump($tcarte[$col[1]]->getNumero());
                                var_dump($tcarte[$col[2]]->getNumero());
                                var_dump( $tb[$borne]['position']);
                                var_dump($tb);
                                echo '<h1>$x</h1>';
                                var_dump($x);
                                echo '<h1>$y</h1>';
                                var_dump($y);
                                echo '</br>$a';
                                var_dump($a2);
                                echo '</br>$c';
                                var_dump($c2);*/




                                $partie->setListeDesBornes($tb);
                                $em->persist($partie);
                                $em->flush();

                                return $this->redirectToRoute('finPartie', array(
                                    'partie' => $partie->getId()));
                            }
                            else {
                                return $this->redirectToRoute('finPartie', array(
                                    'partie' => $partie->getId()));
                            }
                        }
                        else {
                            return $this->redirectToRoute('finPartie', array(
                                'partie' => $partie->getId()));
                        }
                    }
                    else {
                        return $this->redirectToRoute('finPartie', array(
                            'partie' => $partie->getId()));
                    }
                }
                else {
                    return $this->redirectToRoute('finPartie', array(
                        'partie' => $partie->getId()));
                }

            }
            else {
                return $this->redirectToRoute('finPartie', array(
                    'partie' => $partie->getId()));
            }
        }

        else {
            return $this->redirectToRoute('finPartie', array(
                'partie' => $partie->getId()));
        }

    }

    /**
     * @Route("/finPartie/{partie}", name="finPartie")
     */
    public function finPartieAction(Request $request, Partie $partie)
    {
        $em = $this->getDoctrine()->getManager();

        //FIN PARTIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIE
        //Toutes bornes dans tableau
        $listebornes = $partie->getListeDesBornes();
        $encours = $partie->getEncours();


        $bj1 = array();
        $bj2 = array();

        //calcul nombre bornes pour chaque joueur
        foreach ($listebornes as $bornes) {
            if ($bornes['position'] == 'J1') {
                $bj1[] = $bornes;
            }

            elseif ($bornes['position'] == 'J2') {
                $bj2[] = $bornes;
            }
        }

        sort($bj1);
        sort($bj2);

        /*
        var_dump($bj1);
        var_dump($bj2);

        echo 'var_dump($bj1[2])';
        var_dump($bj1[2]);

        echo 'id borne 1';
        var_dump($bj1[0]['id_borne']);

        echo 'id borne 2 -1';
        var_dump($bj1[1]['id_borne']-1);
        echo 'id borne 2';
        var_dump($bj1[1]['id_borne']);

        echo 'id borne 3 -1';
        var_dump($bj1[2]['id_borne']-1);
        echo 'id borne 3';
        var_dump($bj1[2]['id_borne']);*/


        $gagnant = $partie->getGagnant();

        //regarde si + de 2 bornes a j1 et si oui, sont dans l'ordre ?
        if (count($bj1) > 2){
            if ($bj1[0]['id_borne'] == $bj1[1]['id_borne']-1 && $bj1[1]['id_borne'] == $bj1[2]['id_borne']-1){
                $gagnant = $partie->getJoueur1();
            }
        }

        //regarde si + de 2 bornes a j2 et si oui, sont dans l'ordre ?
        if (count($bj2) > 2) {
            if ($bj2[0]['id_borne'] == $bj2[1]['id_borne'] - 1 && $bj2[1]['id_borne'] == $bj2[2]['id_borne'] - 1) {
                $gagnant = $partie->getJoueur2();
            }
        }

        //teste si j1 =5 bornes
        if (count($bj1) > 4) {
            $gagnant = $partie->getJoueur1();
        }
        //teste si j2 =5 bornes
        if (count($bj2) > 4) {
            $gagnant = $partie->getJoueur2();
        }

        //teste si plus de cartes dans main j1
        if (count($partie->getMainj1()) == 0) {
            if (count($bj2) > count($bj1)) {
                $gagnant = $partie->getJoueur2();
            }
            elseif (count($bj1) > count($bj2)) {
                $gagnant = $partie->getJoueur2();
            }
        }


        //teste si plus de cartes dans main j2
        if (count($partie->getMainj2()) == 0) {
            if (count($bj2) > count($bj1)) {
                $gagnant = $partie->getJoueur2();
            }
            elseif (count($bj1) > count($bj2)) {
                $gagnant = $partie->getJoueur2();
            }
        }


        if ($gagnant != ''){
            $encours = 0;
        }

        $partie->setGagnant($gagnant);

        $partie->setEncours($encours);

        $em->persist($partie);
        $em->flush();

        return $this->redirectToRoute('afficher_plateau', array(
            'partie' => $partie->getId()));

    }

}
