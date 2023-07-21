<?php

namespace App\DataFixtures;

use Faker;
use Faker\Generator;
use App\Entity\Formation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class FormationFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        $formation = ['Designer', 'Comptable', 'Vendeur Polyvalent', 'Ingenieur', 'Manutentionnaire', 'Développeur', 'Employer Polyvalent de restauration'];
        for ($form = 0; $form < 25; $form++) {
            $this->createFormation(
                $formation[\rand(0, 6)],
                \DateTimeImmutable::createFromMutable($this->faker->datetime()),
                $formation[\rand(0, 6)],
                $manager
            );
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function createFormation(
        string $lastclass,
        \DateTimeInterface $schoolleavingdate,
        string $lastdiplomaobtained,
        ObjectManager $manager
    ): Formation {
        $formation = new Formation();
        $formation->setLastclass($lastclass);
        $formation->setSchoolleavingdate($schoolleavingdate);
        $formation->setLastdiplomaobtained($lastdiplomaobtained);
        $manager->persist($formation);
        return $formation;
    }
}
