<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        ['Title' => 'Walking dead', 'Synopsis' => 'Des zombies envahissent la terre', 'Category' => 'Horreur', country],
        ['Title' => 'Dora l\'exploratrice', 'Synopsis' => 'Des explosions à gogo', 'Category' => 'Action'],
        ['Title' => 'Inception', 'Synopsis' => 'Tes où, mais tu es pas là', 'Category' => 'Fantastique'],
        ['Title' => 'Iron man', 'Synopsis' => 'Vers l\'infini et au delà', 'Category' => 'Aventure'],
        ['Title' => 'Hulk', 'Synopsis' => 'Tout vert', 'Category' => 'Animation'],
        ['Title' => 'Mon voisin le tueur', 'Synopsis' => 'Mort de rire', 'Category' => 'Comedie'],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAM as $key => $programName) {

        $program = new Program();
        $program->setTitle($programName['Title']);
        $program->setSynopsis($programName['Synopsis']);
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
