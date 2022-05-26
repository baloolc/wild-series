<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        const EPISODE = [
            ['Title' => 'aaaaaaah', 'Number' => '1', 'Synopsis' => 'Il court'],
            ['Title' => 'Aimer', 'Number' => '2', 'Synopsis' => 'Il court'],
            ['Title' => 'Mourir', 'Number' => '3', 'Synopsis' => 'Il court'],
            ['Title' => 'Speed', 'Number' => '4', 'Synopsis' => 'Il court'],
            ['Title' => 'Moche', 'Number' => '5', 'Synopsis' => 'Il court'],
            ['Title' => 'Rip', 'Number' => '6', 'Synopsis' => 'Il court'],
        ]

        $manager->flush();
    }
}
