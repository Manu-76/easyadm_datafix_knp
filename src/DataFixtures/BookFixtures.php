<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle('Il était deux fois');
        $book->setAutor($this->getReference(AutorFixtures::F_THILLIEZ));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('L\'âme du mal');
        $book->setAutor($this->getReference(AutorFixtures::M_CHATTAM));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Mamie Luger');
        $book->setAutor($this->getReference(AutorFixtures::B_PHILIPPON));
        $manager->persist($book);

        $manager->flush();
    }
}
