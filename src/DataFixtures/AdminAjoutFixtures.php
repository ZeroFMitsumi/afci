<?php

namespace App\DataFixtures;

use Faker;
use Faker\Generator;
use App\Entity\AdminAjout;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AdminAjoutFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $this->faker->date('d-m-Y');

        for ($aa = 0; $aa < 25; $aa++) {
        }
        $this->createAdminAjout('true', 'false', $manager);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function createAdminAjout(
        bool $is_pe,
        bool $is_asp,
        ObjectManager $manager
    ): AdminAjout {
        $aA = new AdminAjout();
        $aA->setStagiaireId($this->faker->randomNumber(10, true));
        $aA->setIsPe($is_pe);
        $aA->setIsAsp($is_asp);
        if ($is_asp) {
            $aA->setAspCreatedAt(\DateTimeImmutable::createFromMutable($this->faker->datetime()));
        } else {
            $aA->setAspCreatedAt(null);
        }
        $manager->persist($aA);

        return $aA;
    }
}
