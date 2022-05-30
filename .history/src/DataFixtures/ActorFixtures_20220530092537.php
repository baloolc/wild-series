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
       $names = []

        for ($i = 0; $i < 10; $i++) {
            $names[] = $faker->lastName();
        }

        foreach($names as $name)
        {
            $actor = new Actor;
            $actor->setName($name);
            for ($j = 0; $j < 3; $j++) {
                $actor->addProgram($this->getReference('program_' . $faker->unique()->numberBetween(1, 3)));
            }
            $manager->persist($actor);
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
