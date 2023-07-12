<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\CreatedAtTrait;
use App\Repository\AdminAjoutRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AdminAjoutRepository::class)]
class AdminAjout
{
    use CreatedAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\NotBlank(message: 'Le champ doit contenir numéro de stagiaire')]
    #[Assert\Length(
        min: 10,
        max: 10,
    )]
    private ?int $stagiaire_id;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?bool $is_pe;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?bool $is_asp;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $asp_created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStagiaireId(): ?int
    {
        return $this->stagiaire_id;
    }

    public function setStagiaireId(int $stagiaire_id): static
    {
        $this->stagiaire_id = $stagiaire_id;

        return $this;
    }

    public function isIsPe(): ?bool
    {
        return $this->is_pe;
    }

    public function setIsPe(bool $is_pe): static
    {
        $this->is_pe = $is_pe;

        return $this;
    }

    public function isIsAsp(): ?bool
    {
        return $this->is_asp;
    }

    public function setIsAsp(bool $is_asp): static
    {
        $this->is_asp = $is_asp;

        return $this;
    }

    public function getAspCreatedAt(): ?\DateTimeInterface
    {
        return $this->asp_created_at;
    }

    public function setAspCreatedAt(?\DateTimeInterface $asp_created_at): static
    {
        $this->asp_created_at = $asp_created_at;

        return $this;
    }
}
