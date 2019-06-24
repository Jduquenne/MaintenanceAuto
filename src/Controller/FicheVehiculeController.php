<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/technicien")
 * @Security("has_role('ROLE_TECHNICIEN')")
 */
class FicheVehiculeController extends AbstractController
{
    /**
     * @Route("/vehicule/id", name="fiche_vehicule")
     */
    public function index()
    {
        return $this->render('fiche_vehicule/index.html.twig', [
            'controller_name' => 'FicheVehiculeController',
        ]);
    }
}
