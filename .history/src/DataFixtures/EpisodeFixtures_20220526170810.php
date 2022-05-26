<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < count(ProgramFixtures::PROGRAM); $i++) 
        {
            $maxSeasons = (8);
            for($y = 0; $y < $maxSeasons; $y++) {
                $episode = new Episode();
                $episode->setNumber($y + 1);
                $episode->setYear($faker->year());
                $episode->setDescription($faker->paragraphs(3, true));
                $episode->setProgram($this->getReference('program_' . $i));
                $this->addReference('season_' . $i . '_' . $y, $episode);
                $manager->persist($season);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [

          SeasonFixtures::class,

        ];

    }
}
