<?php

namespace App\DataFixtures;

use Faker;
use Faker\Generator;
use App\Entity\CivilState;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CivilStateFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $this->faker->date('d-m-Y');

        for ($cs = 0; $cs < 25; $cs++) {
            $this->createCivilState(
                $this->faker->name(),
                $this->faker->country(),
                \DateTimeImmutable::createFromMutable($this->faker->datetime()),
                $this->faker->city(),
                str_replace(' ', '', $this->faker->postcode()),
                $this->faker->country(),
                $this->faker->company(),
                $this->faker->boolean(),
                $this->faker->boolean(),
                $this->faker->boolean(),
                $this->faker->boolean(),
                rand(0, 3),
                $manager
            );
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function createCivilState(
        string $birthname,
        string $nationality,
        \DateTimeInterface $birthday,
        string $city,
        string $zipcode,
        string $country,
        string $cpam,
        bool $single,
        bool $maried,
        bool $man,
        bool $woman,
        int $children,
        ObjectManager $manager
    ): CivilState {
        $cS = new CivilState();
        $cS->setBirthname($birthname);
        $cS->setNationality($nationality);
        $cS->setBirthday($birthday);
        $cS->setCity($city);
        $cS->setZipcode($zipcode);
        $cS->setCountry($country);
        $cS->setSocialsecuritynumber($this->faker->nir());
        $cS->setCpam($cpam);
        $cS->setSingle($single);
        $cS->setMaried($maried);
        $cS->setMan($man);
        $cS->setWoman($woman);
        $cS->setChildren($children);

        $manager->persist($cS);

        return $cS;
    }
}
