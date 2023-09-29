<?php

namespace App\DataFixtures;

use App\Entity\Person;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $names = [
            'Jacob',
            'Emily',
            'Michael',
            'Emma',
            'Joshua',
            'Madison',
            'Matthew',
            'Olivia',
            'Ethan',
            'Hannah',
            'Andrew',
            'Abigail',
            'Daniel',
            'Isabella',
            'William',
            'Ashley',
            'Joseph',
            'Samantha',
            'Christopher',
            'Elizabeth',
        ];

        foreach ($names as $name) {
            $person = new Person();
            $person->setName($name);
            $person->setAge(rand(1, 99));
            $manager->persist($person);
        }

        $manager->flush();
    }
}
