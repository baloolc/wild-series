<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 50; $i++) {

        $program = new Program();
        $program->setTitle($programName['Title']);
        $program->setSynopsis($programName['Synopsis']);
        $program->setCountry($programName['Country']);
        $program->setYear($programName['Year']);
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
