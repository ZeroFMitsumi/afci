<?php

namespace App\DataFixtures;

use Faker;
use Faker\Generator;
use App\Entity\Users;
use App\Services\Utils;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    private Generator $faker;

    public function __construct(
        private Utils $utils,
        private UserPasswordHasherInterface $passEncoder
    ) {
        $this->faker = Faker\Factory::create();
    }

    public function load(ObjectManager $manager): void
    {

        $admin = $this->createUsers(
            'Freaks',
            'Ging',
            'jinFreaks@hunt.com',
            '0600000000',
            'admin',
            'rue de la ville de Paris',
            '75000',
            'Paris',
            'Île-de-France',
            'admin',
            $manager
        );

        for ($usr = 0; $usr < 25; $usr++) {
            $this->createUsers(
                $this->faker->lastname(),
                $this->faker->firstname(),
                $this->faker->safeEmail(),
                str_replace(' ', '.', $this->faker->serviceNumber()),
                'secret',
                $this->faker->streetaddress(),
                str_replace(' ', '', $this->faker->postcode()),
                $this->faker->city(),
                $this->faker->department(),
                'user',
                $manager
            );
        }
        // $manager->persist($users);

        $manager->flush();
    }

    public function createUsers(
        string $lastname,
        string $firstname,
        string $email,
        string $tel,
        string $password,
        string $address,
        string $zipcode,
        string $city,
        string $departement,
        string $role,
        ObjectManager $manager
    ): Users {
        $usr = new Users();
        $usr->setLastname($lastname);
        $usr->setFirstname($firstname);
        $usr->setEmail($email);
        $usr->setTel($tel);
        $usr->setPassword(
            $this->passEncoder->hashPassword($usr, $password)
        );
        $usr->setAddress($address);
        $usr->setZipcode($zipcode);
        $usr->setCity($city);
        $usr->setDepartement($departement);
        $usr->setRoles($this->utils->updateRole($role));

        // Ajout des classes d'informations a l'utilisateur


        $manager->persist($usr);

        return $usr;
    }
}
