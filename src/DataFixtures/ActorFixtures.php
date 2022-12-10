<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Faker\Factory;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i=0; $i<10; $i++) {
            $actor = new Actor();
            $actor->setName($faker->name(null));
            $numbers = array();
            for ($j=0; $j<3; $j++) {
                $random_number = rand(0,24);
                while (in_array($random_number, $numbers)) {
                    $random_number = rand(0, 24);
                }
                $actor->addProgram($this->getReference('program_' . $random_number));
                $numbers[] = $random_number;
                }
            $manager->persist($actor);
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
