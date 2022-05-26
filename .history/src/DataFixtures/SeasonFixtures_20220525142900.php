<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        const SEASON = [
            ['Number' => '14', 'Year' => '2005', 'Description' => 'La season une est bien après à vos risque et péril'],
            ['Number' => '1', 'Year' => '2004', 'Description' => 'La season une est bien après à vos risque et péril'],
            ['Number' => '3', 'Year' => '2003', 'Description' => 'La season une est bien après à vos risque et péril'],
            ['Number' => '4', 'Year' => '2002', 'Description' => 'La season une est bien après à vos risque et péril'],
            ['Number' => '6', 'Year' => '2001', 'Description' => 'La season une est bien après à vos risque et péril'],
            ['Number' => '9', 'Year' => '2006', 'Description' => 'La season une est bien après à vos risque et péril'],
        ]

        $manager->flush();
    }
}
