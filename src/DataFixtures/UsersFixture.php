<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersFixture extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $gestionnaire = new Users();
        $gestionnaire->setNom("Dupont");
        $gestionnaire->setPrenom("Bertrand");
        $gestionnaire->setEmail("gestionnaire@gmail.com");
        $gestionnaire->setPassword($this->encoder->encodePassword($gestionnaire, "azerty"));
        $gestionnaire->addRole("ROLE_GESTIONNAIRE");
        $gestionnaire->setUsername("Gestionnaire");
        $manager->persist($gestionnaire);


        $technicien = new Users();
        $technicien->setNom("Sagan");
        $technicien->setPrenom("Peter");
        $technicien->setEmail("technicien@gmail.com");
        $technicien->setPassword($this->encoder->encodePassword($technicien, "velo"));
        $technicien->addRole("ROLE_TECHNICIEN");
        $technicien->setUsername("Technicien");
        $manager->persist($technicien);

        $manager->flush();
    }
}
