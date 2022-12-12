<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMPORTFOLIO = [
        [
            'title' => 'Walking dead',
            'synopsis' => 'Des zombies envahissent la terre',
            'category' => 'category_Horreur'
        ],
        [
            'title' => '1899',
            'synopsis' => 'Des migrants de toutes origines quittent le Vieux Continent pour le Nouveau Monde.',
            'category' => 'category_Horreur'
        ],
        [
            'title' => 'Le cabinet des curiosités',
            'synopsis' => 'Une anthologie sur la thématique de l\'horreur créée par Guillermo del Toro, dont chaque épisode sera signé par un réalisateur différent.',
            'category' => 'category_Horreur'
        ],
        [
            'title' => 'The Midnight Club',
            'synopsis' => 'Dans un hôpital réservé aux adolescents atteints de pathologies graves, les malades se retrouvent chaque soir à minuit pour partager des histoires effrayantes.',
            'category' => 'category_Horreur'
        ],
        [
            'title' => 'Resident Evil',
            'synopsis' => 'Des années après une apocalypse mondiale causée par un virus mortel, Jade Wesker jure de faire tomber les responsables, tout en s\'efforçant d\'échapper aux infectés.',
            'category' => 'category_Horreur'
        ],
        [
            'title' => '24 Heures Chrono',
            'synopsis' => 'Agent fédéral et responsable de la Cellule Anti-Terroriste de Los Angeles, Jack Bauer a 24 heures pour mener à bien sa mission.',
            'category' => 'category_Action'
        ],
        [
            'title' => 'Gotham Knights',
            'synopsis' => 'Au lendemain du meurtre de Bruce Wayne, son fils adoptif rebelle forge une alliance improbable avec les enfants des ennemis de Batman alors qu\'ils sont tous accusés d\'avoir tué le Caped Crusader.',
            'category' => 'category_Action'
        ],
        [
            'title' => 'Willow',
            'synopsis' => ' Au royaume enchanté des fées et du dragon à deux têtes Eborsisk, de nouveaux personnages feront leur apparition, mais on retrouvera également Willow Ufgood, le nain amateur de magie.',
            'category' => 'category_Action'
        ],
        [
            'title' => 'Zootopia',
            'synopsis' => 'Repartez faire un tour dans la métropole des mammifères avec cette nouvelle série de courts-métrages.',
            'category' => 'category_Action'
        ],
        [
            'title' => 'Magnum',
            'synopsis' => 'Ancien combattant de la Guerre du Viêt Nam, Thomas Magnum s\'occupe de la sécurité du domaine d\'Oahu propriété de l\'écrivain Robin Masters.',
            'category' => 'category_Action'
        ],
        [
            'title' => 'Les Simpsons',
            'synopsis' => 'Les Simpson, famille américaine moyenne, vivent à Springfield. Homer, le père, a deux passions : regarder la télé et boire des bières.',
            'category' => 'category_Animation'
        ],
        [
            'title' => 'Rick et Morty',
            'synopsis' => 'Rick est un scientifique âgé et déséquilibré qui a récemment renoué avec sa famille. Il passe le plus clair de son temps à entraîner son petit-fils Morty dans des aventures extraordinaires et dangereuses, à travers l\'espace et dans des univers parallèles.',
            'category' => 'category_Animation'
        ],
        [
            'title' => 'Dragon Ball Z',
            'synopsis' => 'Dragon Ball Z reprend l\'histoire de Sangoku plusieurs années après son mariage avec Chichi. Le couple a un fils nommé Sangohan en hommage à son arrière grand-père du même nom.',
            'category' => 'category_Animation'
        ],
        [
            'title' => 'South Park',
            'synopsis' => 'La petite ville de South Park dans le Colorado est le théâtre des aventures de Cartman, Stan, Kyle et Kenny, quatre enfants au langage quelque peu... décalé !',
            'category' => 'category_Animation'
        ],
        [
            'title' => 'One Punch Man',
            'synopsis' => 'Le super-héros le plus puissant au monde est capable de tuer n\'importe qui sans se fatiguer. Et c\'est justement ça son problème : l\'absence de défi et donc la morosité.',
            'category' => 'category_Animation'
        ],
        [
            'title' => 'Stanger Things',
            'synopsis' => '1983, à Hawkins. La petite ville du Midwest est témoin de phénomènes étranges',
            'category' => 'category_Fantastique'
        ],
        [
            'title' => 'Game of Thrones',
            'synopsis' => 'Il y a très longtemps, à une époque oubliée, une force a détruit l\'équilibre des saisons. Dans un pays où l\'été peut durer plusieurs années et l\'hiver toute une vie, des forces sinistres et surnaturelles se pressent aux portes du Royaume des Sept Couronnes.',
            'category' => 'category_Fantastique'
        ],
        [
            'title' => 'Black Mirror',
            'synopsis' => 'L’intrigue se place dans un futur atemporel et peut être située dans différentes zones de Grande-Bretagne. Chacun des épisodes de cette série raconte une nouvelle histoire indépendante des autres, se déroulant dans un décor différent et avec à chaque fois un nouveau casting.',
            'category' => 'category_Fantastique'
        ],
        [
            'title' => 'Flash',
            'synopsis' => 'Jeune expert de la police scientifique de Central City, Barry Allen se retrouve doté d\'une vitesse extraordinaire après avoir été frappé par la foudre. Sous le costume de Flash, il utilise ses nouveaux pouvoirs pour combattre le crime.',
            'category' => 'category_Fantastique'
        ],
        [
            'title' => 'Supernatural',
            'synopsis' => 'Deux frères, Sam et Dean Winchester, chasseurs de créatures surnaturelles, sillonnent les États-Unis à bord d\'une Chevrolet Impala noire de 1967 et enquêtent sur des phénomènes paranormaux (souvent issus du folklore, des superstitions, mythes et légendes urbaines américaines, mais aussi des monstres surnaturels tels que les fantômes, loups-garous, démons, vampires…).',
            'category' => 'category_Fantastique'
        ],
        [
            'title' => 'The Mandalorian',
            'synopsis' => 'Après les aventures de Jango et Boba Fett, un nouveau héros émerge dans Star Wars.',
            'category' => 'category_Aventure'
        ],
        [
            'title' => 'Sherlock',
            'synopsis' => 'Les aventures de Sherlock Holmes et de son acolyte de toujours, le docteur Watson, sont transposées au XXIème siècle...',
            'category' => 'category_Aventure'
        ],
        [
            'title' => 'Darna',
            'synopsis' => 'Lorsque des fragments d\'un cristal vert se dispersent dans la ville et transforment les gens en monstres destructeurs, Narda embrasse son destin de Darna, la puissante protectrice de la puissante pierre de la planète Marte.',
            'category' => 'category_Aventure'
        ],
        [
            'title' => 'The Winchesters',
            'synopsis' => 'Dean Winchester nous raconte de son point de vue, la rencontre et l’histoire d’amour de ses parents, John et Mary Winchester. La recherche de leurs pères disparus les réunira et ils s’associeront à deux chasseurs de démons, Carlos et Latika.',
            'category' => 'category_Aventure'
        ],
        [
            'title' => 'NCIS : Enquêtes Spéciales',
            'synopsis' => 'À la tête de cette équipe du NCIS, qui opère en dehors de la chaîne de commandement militaire, l\'agent Special Leroy Jethro Gibbs, un enquêteur qualifié dont les qualités sont d\'être intelligent, solide et prêt à contourner les règles pour faire le travail.',
            'category' => 'category_Aventure'
        ],
    ];

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMPORTFOLIO as $key => $programContent) {
            $program = new Program();
            $program->setTitle($programContent['title']);
            $program->setSynopsis($programContent['synopsis']);
            $program->setCategory($this->getReference($programContent['category']));
            $program->setSlug($this->slugger->slug($program->getTitle()));
            $manager->persist($program);
            $this->addReference('program_' . $key, $program);
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
