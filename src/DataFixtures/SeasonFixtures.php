<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 125; $i++) {
            $season = new Season();
            $season->setNumber($faker->numberBetween(1, 5));
            $season->setYear($faker->year());
            $season->setDescription($faker->paragraphs(3, true));
            $season->setProgram($this->getReference('program_' . $faker->numberBetween(0, 24)));
            $manager->persist($season);
            $this->addReference('season_' . $i, $season);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
