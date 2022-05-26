<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < count(ProgramFixtures::PROGRAMS); $i++) 
        {
            $maxSeasons = (8);
            for($y = 0; $y < $maxSeasons; $y++) {
                $season = new Season();
                $season->setNumber($y + 1);
                $season->setYear($faker->year());
                $season->setDescription($faker->paragraphs(3, true));
                $season->setProgram($this->getReference('program_' . $i));
                $this->addReference('season_' . $i . '', $season);
                $manager->persist($season);
            }
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
