<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/technicien")
 * @Security("has_role('ROLE_TECHNICIEN')")
 */
class DashboardTController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard-technicien")
     */
    public function index()
    {
        return $this->render('dashboard_t/index.html.twig', [
            'controller_name' => 'DashboardTController',
        ]);
    }
}
