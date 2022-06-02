<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAM = [
        ['id' => 0, 'Title' => 'Walking dead', 'Synopsis' => 'Des zombies envahissent la terre', 'Category' => 'Horreur', 'Country' => 'USA', 'Year' => '1999'],
        ['id' => 1, 'Title' => 'Dora l\'exploratrice', 'Synopsis' => 'Des explosions à gogo', 'Category' => 'Action', 'Country' => 'USA', 'Year' => '2018'],
        ['id' => 2, 'Title' => 'Inception', 'Synopsis' => 'Tes où, mais tu es pas là', 'Category' => 'Fantastique', 'Country' => 'USA', 'Year' => '2015'],
        ['id' => 3, 'Title' => 'Iron man', 'Synopsis' => 'Vers l\'infini et au delà', 'Category' => 'Aventure', 'Country' => 'USA', 'Year' => '2007'],
        ['id' => 4, 'Title' => 'Hulk', 'Synopsis' => 'Tout vert', 'Category' => 'Animation', 'Country' => 'USA', 'Year' => '1995'],
        ['id' => 5, 'Title' => 'Mon voisin le tueur', 'Synopsis' => 'Mort de rire', 'Category' => 'Comedie', 'Country' => 'France', 'Year' => '1995'],
    ];

    private Slugify $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAM as $key => $programName) {

        $program = new Program();
        $program->setTitle($programName['Title']);
        $program->setSynopsis($programName['Synopsis']);
        $program->setCountry($programName['Country']);
        $program->setYear($programName['Year']);
        $program->setCategory($this->getReference('category_' . $programName['Category']));
        $program->setSlug($this->slugify->generate($programItems['title']));
        $manager->persist($program);
        $this->addReference('program_' . $programName['id'], $program);
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
