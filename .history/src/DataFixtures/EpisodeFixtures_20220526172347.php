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

        for ($i = 0; $i < count(ProgramFixtures::PROGRAM); $i++) {
            $
            for ($j = 0; $j < $maxSeason; $j++) {
                $maxEpisodes = (20);
                for ($y = 0; $y < $maxEpisodes; $y++) {
                    $episode = new Episode();
                    $episode->setNumber($faker->numberBetween(1, 20));
                    $episode->setTitle($faker->title());
                    $episode->setSynopsis($faker->text());
                    $episode->setSeason($this->getReference('season_' . $j));
                    $manager->persist($episode);
                }
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
