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

        
        $firstnames = [];
        $lastnames = [];
        $birthDates = [];
       

        for ($i = 0; $i < 10; $i++)
        {
          $firstnames[] = $faker->firstname();
           $lastnames[] = $faker->lastName();
           $birthDates[] = $faker->unique()->dateTimeBetween('-20 days', '+5 months')->format('Y-m-d');
        }
        
        foreach ($identities as $identity)
        {
            $actor = new Actor;
            $identity['firstname' => []]->setfirstname();
            $identity['lastname' =]->setlastname();
            $identity['birthDate']->setBirthDate();
            for ($i =0; $i < 3; $i++)
            {
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