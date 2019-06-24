<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // Crée erreur si il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();
        // recupere le dernier user taper par l'utitlisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('check'))
            ->add('_username', EmailType::class, ['label' => 'Email', 'attr' => ['class' => 'form-control form-control-lg'], 'required' => false])
            ->add('_password', PasswordType::class, ['label' => 'Mot de passe', 'attr' => ['class' => 'form-control form-control-lg'], 'required' => false])
            ->add('submit', SubmitType::class, ['label' => 'Connexion', 'attr' => ['class' => 'btn btn-success btn-lg float-right'] ])
            ->getform();


        return $this->render('security/login.html.twig', [
            'mainNavLogin' => true, 'title' => 'Connexion',
            'loginForm' => $form->createView(),
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/check", name="check")
     */
    public function check()
    {
        return new Response();
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
        return new Response();
    }

    /**
     * @Route("/", name="accueil_afterlog")
     */
    public function accueil()
    {
        return $this->render('index/afterconnect.html.twig');
    }
}
