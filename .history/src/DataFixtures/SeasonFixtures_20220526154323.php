<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 0; $i < 8; $i++) {
            $season = new Season();
            $season->setNumber($faker->numberBetween(1, 8));
            $season->setYear($faker->year());
            $season->setDescription($faker->paragraphs(3, true));
            $season->setProgram($this->getReference('program_' . $faker->numberBetween(0, 6)));
            $this->addReference('category_' . $categoryName, $category);
            $manager->persist($season);
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
