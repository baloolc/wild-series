<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SessionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        const SEASON

        $manager->flush();
    }
}
