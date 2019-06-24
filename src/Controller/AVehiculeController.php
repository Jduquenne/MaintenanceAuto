<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/gestionnaire")
 * @Security("has_role('ROLE_GESTIONNAIRE')")
 */
class AVehiculeController extends AbstractController
{
    /**
     * @Route("/ajout-vehicule", name="ajout-vehicule")
     */
    public function index()
    {
        return $this->render('a_vehicule/index.html.twig', [
            'controller_name' => 'AVehiculeController',
        ]);
    }
}
