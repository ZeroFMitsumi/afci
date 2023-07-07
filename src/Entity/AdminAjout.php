<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AdminAjoutRepository;

#[ORM\Entity(repositoryClass: AdminAjoutRepository::class)]
class AdminAjout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    private ?int $stagiaire_id;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at;

    #[ORM\Column]
    private ?bool $is_pe;

    #[ORM\Column]
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

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
