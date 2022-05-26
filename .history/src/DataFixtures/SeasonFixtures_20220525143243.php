<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture
{
    const SEASON = [
        ['Number' => '14', 'Year' => '2005', 'Description' => 'La season une est bien après à vos risque et péril'],
        ['Number' => '1', 'Year' => '2004', 'Description' => 'Les seasons sont cool '],
        ['Number' => '3', 'Year' => '2003', 'Description' => 'Aïe'],
        ['Number' => '4', 'Year' => '2002', 'Description' => 'Houahou'],
        ['Number' => '6', 'Year' => '2001', 'Description' => 'Blop'],
        ['Number' => '9', 'Year' => '2006', 'Description' => 'HAhaha']
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SEASON as $key => $seasonName) {

        $season = new Season();
        $season->setTitle($programName['Title']);
        $season->setSynopsis($programName['Synopsis']);
        $season->setCategory($this->getReference('category_' . $programName['Category']));
        $manager->persist($program);
        }
        $manager->flush();
    }
}
