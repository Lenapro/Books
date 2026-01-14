<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;
use App\Entity\Author;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des auteurs
        $listAuthor = [];
        for ($i=0; $i < 10 ; $i++) { 
            $author = new Author();
            $author -> setFirstname('firstname author ' .$i);
            $author -> setLastname('lastname author ' .$i);
            $manager->persist($author);

            $listAuthor[] = $author;
        }

        // Création d'une vingtaine de livres ayant pour titre
        for ($i=0; $i < 20 ; $i++) { 
            $book = new Book();
            $book -> setTitle('Livre ' .$i);
            $book->setAuthor($listAuthor[array_rand($listAuthor)]);
            
            $manager->persist($book);
        }

        $manager->flush();


    }
}
