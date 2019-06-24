<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/technicien")
 * @Security("has_role('ROLE_TECHNICIEN')")
 */
class COperationController extends AbstractController
{
    /**
     * @Route("/operation-creation", name="operation-creation")
     */
    public function index()
    {
        return $this->render('c_operation/index.html.twig', [
            'controller_name' => 'COperationController',
        ]);
    }
}
