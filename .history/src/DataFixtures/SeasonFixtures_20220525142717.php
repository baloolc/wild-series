<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        const SEASON = [
            ['Number' => '14', 'Year' => '2005', 'Description' ]
        ]

        $manager->flush();
    }
}
