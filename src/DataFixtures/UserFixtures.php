<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $user = new User();

        $admin->setName("admin")
             ->setPassword("admin")
             ->setRoleId(1)
             ->setCreatedAt(new \DateTime())
             ->setEmail("admin@gmail.com");
        $manager->persist($admin);

        $user->setName("user")
             ->setPassword("user")
             ->setRoleId(2)
             ->setCreatedAt(new \DateTime())
             ->setEmail("user@gmail.com");
        $manager->persist($user);

        $manager->flush();
    }
}
