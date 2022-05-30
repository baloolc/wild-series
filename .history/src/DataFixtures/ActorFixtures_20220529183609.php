<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $
        for ($i = 0; $i < count(ProgramFixtures::PROGRAM); $i++) {
            $program = $this->getReference('program_' . $i);
            $numActor = count($program->getSeasons());
            for ($j = 0; $j < $numSeasons; $j++) {
                $maxEpisodes = rand(1, 10);
                for ($y = 0; $y < $maxEpisodes; $y++) {
                    $episode = new Episode();
                    $episode->setNumber($faker->numberBetween(1, 20));
                    $episode->setTitle($faker->sentence());
                    $episode->setSynopsis($faker->text());
                    $episode->setSeason($this->getReference('season_' . $i . '_' . $j));
                    $manager->persist($episode);
                }
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [

            ActorFixtures::class,

        ];
    }
}