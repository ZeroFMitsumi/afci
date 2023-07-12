<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\InformationSession;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

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
        Users $usr,
        ObjectManager $manager
        ): Users
    {
        $usr = new Users();
        $usr->setLastname($lastname);
        $usr->setFirstname($firstname);
        $usr->setEmail($email);
        $usr->setTel($tel);
        $usr->setPassword($password);
        $usr->setAddress($address);
        $usr->setZipcode($zipcode);
        $usr->setCity($city);
        $usr->setDepartement($departement);

        // Ajout des classes d'informations a l'utilisateur


        $manager->persist($usr);
        
        return $usr;
    }

    public function createInformationSession(
        string $session_id,
        string $location,
        string $designation,
        InformationSession $info,
        ObjectManager $manager
    ): InformationSession
    {
        $info = new InformationSession();
        $info->setSessionId($session_id);
        $info->setLocation($location);
        $info->setDesignation($designation);

        $manager->persist($info);
        return $info;
    }
}
