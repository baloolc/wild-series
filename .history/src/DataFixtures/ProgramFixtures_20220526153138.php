<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for($i = 0; $i < 6; $i++) {

        $program = new Program();
        $program->setTitle($programName['Title']);
        $program->setSynopsis($programName['Synopsis']);
        $program->setCountry($programName['Country']);
        $program->setYear($faker->year);
        $program->setCategory($this->getReference('category_' . $programName['Category']));
        $manager->persist($program);
        }
        $manager->flush();
    }


    public function getDependencies()
    {
        return [

          CategoryFixtures::class,

        ];

    }
}
