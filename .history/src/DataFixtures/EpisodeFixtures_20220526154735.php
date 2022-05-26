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

        for($i = 0; $i < 20; $i++) {
            $season = new Episode();
            $season->setTitle($faker->titl);
            $season->setYear($faker->year());
            $season->setDescription($faker->paragraphs(3, true));
            $season->setSeason($this->getReference('season_' . $faker->numberBetween(0, 8)));
            $manager->persist($season);
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
