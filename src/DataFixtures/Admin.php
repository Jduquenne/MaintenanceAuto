<?php

namespace App\DataFixtures;


use App\Entity\Administration;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Admin extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $admin = new Administration();
        $admin->setNom("Duquenne");
        $admin->setPrenom("Jason");
        $admin->setEmail("admin@gmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, "admin"));
        $admin->addRole("ROLE_ADMIN");
        $admin->setUsername("Administrateur");
        $manager->persist($admin);

        $manager->flush();
    }
}
