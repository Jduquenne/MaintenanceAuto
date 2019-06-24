<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



/**
 * @Route("/admin")
 * @Security("has_role('ROLE_ADMIN')")
*/


class AdminGestionnairesController extends AbstractController
{
    /**
     * @Route("/gestionnaires", name="admin_gestionnaires")
     */
    public function index()
    {
        return $this->render('admin_gestionnaires/index.html.twig', [
            'controller_name' => 'AdminGestionnairesController',
        ]);
    }
}
