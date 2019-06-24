<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('email', EmailType::class, array('label' => 'Username', 'attr' => ['class' => 'form-control']))
            ->add('nom', TextType::class, array('label' => 'Username', 'attr' => ['class' => 'form-control']))
            ->add('prenom', TextType::class, array('label' => 'Username', 'attr' => ['class' => 'form-control']))
            ->add('username', TextType::class, array('label' => 'Username', 'attr' => ['class' => 'form-control']))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Mot de passe', 'attr' => ['class' => 'form-control mb-3']),
                'second_options' => array('label' => 'Confirmation du mot de passe', 'attr' => ['class' => 'form-control']),
            ))
            ->add('roles', ChoiceType::class, [
                'multiple'=> false,
                'expanded'=> true,
                'choices'  => [
                    'Gestionnaire' => "ROLE_GESTIONNAIRE",
                    'Technicien' => "ROLE_TECHNICIEN",
                ],
            ])
            ->add('submit', SubmitType::class, ['label'=>'Crée le compte', 'attr'=>['class'=>'btn btn-dark']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
