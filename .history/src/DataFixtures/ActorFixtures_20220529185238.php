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

        $identit = [
        'firstname' => [],
        'lastname' => [],
        'birthDate' => []
        ];

        for ($i = 0; $i < 10; $i++)
        {
            $identities['firstname[]'] = $faker->firstname();
            $identities['lastname[]'] = $faker->lastName();
            $identities['birthDate[]'] = $faker->birthDate();
        }

        foreach ($identities as $actor)



     
        $manager->flush();
    }

    public function getDependencies()
    {
        return [

            ActorFixtures::class,

        ];
    }
}