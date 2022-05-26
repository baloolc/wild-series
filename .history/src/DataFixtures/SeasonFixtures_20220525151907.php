<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach (self::SEASON as $key => $seasonName) {

        $season = new Season();
        $season->setNumber($seasonName['Number']);
        $season->setYear($seasonName['Year']);
        $season->setDescription($seasonName['Description']);
        $season->setProgram($this->getReference('program_' . $seasonName['Program']));
        $manager->persist($seasonName);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          ProgramFixtures::class,
        ];

    }
}
