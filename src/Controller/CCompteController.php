<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class CCompteController extends AbstractController
{
    /**
     * @Route("/register", name="creationcompte")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        // 1) build the form
        $user = new Users();
        $form = $this->createForm( RegisterType::class, $user);
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //on active par défaut
            $user->setIsActive(true);
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Votre compte à bien été enregistré.');
            return $this->redirectToRoute('admin_gestionnaires');
        }
        return $this->render('c_compte/register.html.twig',
            [
                'registerform' => $form->createView(),
                'mainNavRegistration' => true,
                'title' => 'Inscription'
            ]);
    }
}
