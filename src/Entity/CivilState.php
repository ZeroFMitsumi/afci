<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CivilStateRepository;

#[ORM\Entity(repositoryClass: CivilStateRepository::class)]
class CivilState
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $birthname = null;

    #[ORM\Column(length: 255)]
    private ?string $nationality = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 150)]
    private ?string $city = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column]
    private ?int $socialsecuritynumber = null;

    #[ORM\Column(length: 150)]
    private ?string $cpam = null;

    #[ORM\Column]
    private ?bool $man = null;

    #[ORM\Column]
    private ?bool $woman = null;

    #[ORM\Column]
    private ?bool $maried = null;

    #[ORM\Column]
    private ?bool $single = null;

    #[ORM\Column(nullable: true)]
    private ?int $children = null;

    #[ORM\OneToOne(inversedBy: 'civilState', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBirthname(): ?string
    {
        return $this->birthname;
    }

    public function setBirthname(?string $birthname): static
    {
        $this->birthname = $birthname;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): static
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getSocialsecuritynumber(): ?int
    {
        return $this->socialsecuritynumber;
    }

    public function setSocialsecuritynumber(int $socialsecuritynumber): static
    {
        $this->socialsecuritynumber = $socialsecuritynumber;

        return $this;
    }

    public function getCpam(): ?string
    {
        return $this->cpam;
    }

    public function setCpam(string $cpam): static
    {
        $this->cpam = $cpam;

        return $this;
    }

    public function isMan(): ?bool
    {
        return $this->man;
    }

    public function setMan(bool $man): static
    {
        $this->man = $man;

        return $this;
    }

    public function isWoman(): ?bool
    {
        return $this->woman;
    }

    public function setWoman(bool $woman): static
    {
        $this->woman = $woman;

        return $this;
    }

    public function isMaried(): ?bool
    {
        return $this->maried;
    }

    public function setMaried(bool $maried): static
    {
        $this->maried = $maried;

        return $this;
    }

    public function isSingle(): ?bool
    {
        return $this->single;
    }

    public function setSingle(bool $single): static
    {
        $this->single = $single;

        return $this;
    }

    public function getChildren(): ?int
    {
        return $this->children;
    }

    public function setChildren(?int $children): static
    {
        $this->children = $children;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    public function setUserId(Users $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
}
