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

        $actors = [
        'firstname' = [],
        lastname' = [],
        birthDate = []
        ];

        for ($i = 0; $i < 10; $i++)
        {
            $actors['firstname[]'] = $faker->firstname();
            $lastname[] = $faker->lastName();
            $birthDate[] = $faker->birthDate();
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