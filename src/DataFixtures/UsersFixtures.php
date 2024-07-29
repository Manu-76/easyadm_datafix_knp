<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // USER
        $user = new User();
        $user->setEmail('user@user.com');
        $password = $this->hasher->hashPassword($user, 'pass_1234');
        $user->setPassword($password);
        $user->setRoles(["ROLE_USER"]);
        $manager->persist($user);

        // ADMIN
        $user = new User();
        $user->setEmail('admin@admin.com');
        $password = $this->hasher->hashPassword($user, 'pass_1234');
        $user->setPassword($password);
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $manager->persist($user);

        $manager->flush();
    }
}
