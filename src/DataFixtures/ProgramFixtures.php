<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMPORTFOLIO = [
        [
            'title' => 'Walking dead',
            'synopsis' => 'Des zombies envahissent la terre',
            'category' => 'category_Horreur'
        ],
        [
            'title' => '24 Heures Chrono',
            'synopsis' => 'Agent fédéral et responsable de la Cellule Anti-Terroriste de Los Angeles, Jack Bauer a 24 heures pour mener à bien sa mission',
            'category' => 'category_Action'
        ],
        [
            'title' => 'Les Simpsons',
            'synopsis' => 'Les Simpson, famille américaine moyenne, vivent à Springfield. Homer, le père, a deux passions : regarder la télé et boire des bières.',
            'category' => 'category_Animation'
        ],
        [
            'title' => 'Stanger Things',
            'synopsis' => '1983, à Hawkins. La petite ville du Midwest est témoin de phénomènes étranges',
            'category' => 'category_Fantastique'
        ],
        [
            'title' => 'The Mandalorian',
            'synopsis' => 'Après les aventures de Jango et Boba Fett, un nouveau héros émerge dans Star Wars.',
            'category' => 'category_Aventure'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMPORTFOLIO as $programContent) {
            $program = new Program();
            $program->setTitle($programContent['title']);
            $program->setSynopsis($programContent['synopsis']);
            $program->setCategory($this->getReference($programContent['category']));
            $manager->persist($program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
