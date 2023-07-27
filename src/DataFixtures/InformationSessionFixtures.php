<?php

namespace App\DataFixtures;

use Faker;
use Faker\Generator;
use App\Entity\InformationSession;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InformationSessionFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $formation = ['Designer web', 'Développeur web', 'Développeur mobile'];
        for ($session = 0; $session < 3; $session++) {
            $this->createInformationSession(
                $this->faker->region(),
                $formation[$session],
                $manager
            );
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function createInformationSession(
        string $location,
        string $designation,
        ObjectManager $manager
    ): InformationSession {
        $info = new InformationSession();
        $info->setSessionId($this->faker->numerify('#####' . $this->faker->randomLetter() . '#####' . $this->faker->randomLetter() . $this->faker->randomLetter()));
        $info->setLocation($location);
        $info->setDesignation($designation);

        $manager->persist($info);
        return $info;
    }
}
