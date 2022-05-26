<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture
{
    const SEASON = [
        ['Number' => '1', 'Year' => '2004', 'Description' => 'La season une est bien après à vos risque et péril'],
        ['Number' => '2', 'Year' => '2003', 'Description' => 'Les seasons sont cool '],
        ['Number' => '3', 'Year' => '2002', 'Description' => 'Aïe'],
        ['Number' => '4', 'Year' => '2001', 'Description' => 'Houahou'],
        ['Number' => '5', 'Year' => '2000', 'Description' => 'Blop'],
        ['Number' => '6', 'Year' => '1999', 'Description' => 'HAhaha']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SEASON as $key => $seasonName) {

        $season = new Season();
        $season->setNumber($seasonName['Number']);
        $season->setYear($seasonName['Year']);
        $season->setDescription($seasonName['Description']);
        $season->set($this->getReference('season_' . $seasonName['Season']));
        $manager->persist($seasonName);
        }
        $manager->flush();
    }
}
