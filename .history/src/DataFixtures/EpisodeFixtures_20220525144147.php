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
            ['Title' => 'Aimer', 'Number' => '1', 'Synopsis' => 'Il court'],
            ['Title' => 'Mourir', 'Number' => '1', 'Synopsis' => 'Il court'],
            ['Title' => 'Speed', 'Number' => '1', 'Synopsis' => 'Il court'],
            ['Title' => '', 'Number' => '1', 'Synopsis' => 'Il court'],
            ['Title' => 'aaaaaaah', 'Number' => '1', 'Synopsis' => 'Il court'],
        ]

        $manager->flush();
    }
}
