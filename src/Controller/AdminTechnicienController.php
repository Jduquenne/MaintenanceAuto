<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
 */
class AdminTechnicienController extends AbstractController
{
    /**
     * @Route("/technicien", name="admin_technicien")
     */
    public function index()
    {
        return $this->render('admin_technicien/index.html.twig', [
            'controller_name' => 'AdminTechnicienController',
        ]);
    }
}
