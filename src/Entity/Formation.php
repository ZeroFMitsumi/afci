<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormationRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 150)]
    #[Assert\Length(min: 3, max: 150)]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private ?string $lastclass;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Assert\DateTime()]
    private ?\DateTimeInterface $schoolleavingdate;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Assert\DateTime()]
    private ?\DateTimeInterface $since;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 3, max: 255)]
    private ?string $lastdiplomaobtained;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $lvl3;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $lvl4;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $lvl5;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $lvl6;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $lvl6_2;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $lvl7;

    #[ORM\OneToOne(inversedBy: 'formation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastclass(): ?string
    {
        return $this->lastclass;
    }

    public function setLastclass(string $lastclass): static
    {
        $this->lastclass = $lastclass;

        return $this;
    }

    public function getSchoolleavingdate(): ?\DateTimeInterface
    {
        return $this->schoolleavingdate;
    }

    public function setSchoolleavingdate(?\DateTimeInterface $schoolleavingdate): static
    {
        $this->schoolleavingdate = $schoolleavingdate;

        return $this;
    }

    public function getSince(): ?\DateTimeInterface
    {
        return $this->since;
    }

    public function setSince(?\DateTimeInterface $since): static
    {
        $this->since = $since;

        return $this;
    }

    public function getLastdiplomaobtained(): ?string
    {
        return $this->lastdiplomaobtained;
    }

    public function setLastdiplomaobtained(string $lastdiplomaobtained): static
    {
        $this->lastdiplomaobtained = $lastdiplomaobtained;

        return $this;
    }

    public function isLvl3(): ?bool
    {
        return $this->lvl3;
    }

    public function setLvl3(bool $lvl3): static
    {
        $this->lvl3 = $lvl3;

        return $this;
    }

    public function isLvl4(): ?bool
    {
        return $this->lvl4;
    }

    public function setLvl4(bool $lvl4): static
    {
        $this->lvl4 = $lvl4;

        return $this;
    }

    public function isLvl5(): ?bool
    {
        return $this->lvl5;
    }

    public function setLvl5(bool $lvl5): static
    {
        $this->lvl5 = $lvl5;

        return $this;
    }

    public function isLvl6(): ?bool
    {
        return $this->lvl6;
    }

    public function setLvl6(bool $lvl6): static
    {
        $this->lvl6 = $lvl6;

        return $this;
    }

    public function isLvl62(): ?bool
    {
        return $this->lvl6_2;
    }

    public function setLvl62(bool $lvl6_2): static
    {
        $this->lvl6_2 = $lvl6_2;

        return $this;
    }

    public function isLvl7(): ?bool
    {
        return $this->lvl7;
    }

    public function setLvl7(bool $lvl7): static
    {
        $this->lvl7 = $lvl7;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(Users $userId): static
    {
        $this->userId = $userId;

        return $this;
    }
}
