<?php

namespace App\DataFixtures;

use App\Entity\Autor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AutorFixtures extends Fixture
{
    // ====================================================== //
    // ===================== PROPRIETES ===================== //
    // ====================================================== //
    public const F_THILLIEZ = 'franck-thilliez';
    public const M_CHATTAM = 'maxime-chattam';
    public const B_PHILIPPON = 'benoit-philippon';

    //  Mise en place d'une reference pour les auteurs afin de pouvoir les utiliser dans la fixture des livres.

    public function load(ObjectManager $manager): void
    {
        $autor = new Autor();
        $autor->setFirstname('Franck');
        $autor->setLastname('Thilliez');
        $manager->persist($autor);
        $this->addReference(self::F_THILLIEZ, $autor);

        $autor = new Autor();
        $autor->setFirstname('Maxime');
        $autor->setLastname('Chattam');
        $manager->persist($autor);
        $this->addReference(self::M_CHATTAM, $autor);
        
        $autor = new Autor();
        $autor->setFirstname('Benoit');
        $autor->setLastname('Philippon');
        $manager->persist($autor);
        $this->addReference(self::B_PHILIPPON, $autor);

        $manager->flush();
    }
}
