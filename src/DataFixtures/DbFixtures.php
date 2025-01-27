<?php

namespace App\DataFixtures;

use App\Entity\Batiment;
use App\Entity\Personne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DbFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $bat = new Batiment();
            $bat->setNom('Batiment ' . $faker->word);
            $bat->setAdresse($faker->address);
            $bat->setAnnee($faker->year);
            $bat->setStyle($faker->word);
            for ($j = 0; $j < 5; $j++) {
                $pers = new Personne();
                $pers->setNom($faker->lastName);
                $pers->setPrenom($faker->firstName);
                $pers->setEmail($faker->email);
                $pers->setAdresse($faker->address);
                $pers->setBatiment($bat);
                $bat->addPersonne($pers);
                $manager->persist($pers);
            }
            $manager->persist($bat);
        }

        $manager->flush();
    }
}
