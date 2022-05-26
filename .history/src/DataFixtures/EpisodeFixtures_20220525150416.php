<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture
{
    const EPISODE = [
        ['Title' => 'aaaaaaah', 'Number' => '1', 'Synopsis' => 'Il court'],
        ['Title' => 'Aimer', 'Number' => '2', 'Synopsis' => 'Il vol'],
        ['Title' => 'Mourir', 'Number' => '3', 'Synopsis' => 'Il tombe'],
        ['Title' => 'Speed', 'Number' => '4', 'Synopsis' => 'Il va vite'],
        ['Title' => 'Moche', 'Number' => '5', 'Synopsis' => 'Il est moche'],
        ['Title' => 'Rip', 'Number' => '6', 'Synopsis' => 'Il creuse'],
    ];

    public function load(ObjectManager $manager): void
    {
      foreach (self::EPISODE as $key => $episodeName) {

        $episode = new Season();
        $episode->setNumber($episodeName['Title']);
        $episode->setYear($episodeName['Number']);
        $episode->setDescription($episodeName['Synopsis']);
        $episode->set($this->getReference('program_' . $episodeName['Program']));
        $manager->persist($episodeName);
        }
        $manager->flush();

        $manager->flush();
    }
}
