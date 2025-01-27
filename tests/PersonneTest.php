<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class PersonneTest extends TestCase
{
    public function testPersonne(): void
    {
        $pers = new \App\Entity\Personne();
        $pers->setNom('Doe');
        $pers->setPrenom('John');
        $pers->setEmail('john.doe@mail.com');
        $pers->setAdresse('5 rue de la Paix');
        $bat = new \App\Entity\Batiment();
        $bat->setNom('Batiment 1');
        $pers->setBatiment($bat);
        $this->assertEquals('Doe', $pers->getNom());
        $this->assertEquals('John', $pers->getPrenom());
        $this->assertEquals('john.doe@mail.com', $pers->getEmail());
        $this->assertEquals('5 rue de la Paix', $pers->getAdresse());
        $this->assertEquals($bat->getNom(), $pers->getBatiment()->getNom());
    }
}
