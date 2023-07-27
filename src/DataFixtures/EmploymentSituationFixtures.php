<?php

namespace App\DataFixtures;

use Faker;
use Faker\Generator;
use App\Entity\EmploymentSituation;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EmploymentSituationFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $this->faker->date('d-m-Y');

        for ($es = 0; $es < 25; $es++) {
            $this->createEmploymentSituation(
                $this->faker->boolean(),
                $this->faker->boolean(),
                \DateTimeImmutable::createFromMutable($this->faker->datetime()),
                \DateTimeImmutable::createFromMutable($this->faker->datetime()),
                $this->faker->boolean(),
                $this->faker->boolean(),
                $this->faker->boolean(),
                $this->faker->boolean(),
                $this->faker->sentence(rand(1, 5)),
                str_replace(' ', '.', $this->faker->serviceNumber()),
                $this->faker->lastName() . ' ' . $this->faker->firstName(),
                str_replace(' ', '.', $this->faker->serviceNumber()),
                $this->faker->safeEmail(),
                $manager
            );
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function createEmploymentSituation(
        bool $is_pe,
        bool $is_indemnisation_pe,
        \DateTimeInterface $inscrit_since,
        \DateTimeInterface $indemnisation_end,
        bool $is_rsa,
        bool $is_aah,
        bool $is_ass,
        bool $is_aspa,
        string $other_perception,
        string $ml,
        string $ml_tel,
        string $advisor,
        string $advisor_tel,
        string $advisor_mail,
        ObjectManager $manager
    ): EmploymentSituation {
        $eS = new EmploymentSituation();
        $eS->setIsPe($is_pe);
        $eS->setIsIndemnisationPe($is_indemnisation_pe);
        $eS->setPeId($this->faker->randomNumber(7) . $this->faker->randomLetter());
        $eS->setInscritSince($inscrit_since);
        $eS->setIndemnisationEnd($indemnisation_end);
        $eS->setRsa($is_rsa);
        $eS->setAah($is_aah);
        $eS->setIsAss($is_ass);
        $eS->setIsAspa($is_aspa);
        $eS->setOtherPerception($other_perception);
        $eS->setMl($ml);
        $eS->setMlTel($ml_tel);
        $eS->setAdvisor($advisor);
        $eS->setAdvisorTel($advisor_tel);
        $eS->setAdvisorMail($advisor_mail);
        $manager->persist($eS);
        return $eS;
    }
}
