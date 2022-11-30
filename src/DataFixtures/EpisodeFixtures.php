<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 1250; $i++) {
            $episode = new Episode();
            $episode->setNumber($faker->numberBetween(1, 10));
            $episode->setTitle($faker->sentence(5));
            $episode->setSynopsis($faker->paragraph());
            $episode->setSeason($this->getReference('season_' . $faker->numberBetween(0, 124)));
            $manager->persist($episode);
            $this->addReference('episode_' . $i, $episode);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SeasonFixtures::class,
        ];
    }
}
