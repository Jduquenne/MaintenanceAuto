<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/gestionnaire")
 * @Security("has_role('ROLE_GESTIONNAIRE')")
 */
class DashboardGController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard_g")
     */
    public function index()
    {
        return $this->render('dashboard_g/index.html.twig', [
            'controller_name' => 'DashboardGController',
        ]);
    }
}
