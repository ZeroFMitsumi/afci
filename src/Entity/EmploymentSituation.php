<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmploymentSituationRepository;

#[ORM\Entity(repositoryClass: EmploymentSituationRepository::class)]
class EmploymentSituation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $is_pe = null;

    #[ORM\Column]
    private ?bool $is_indemnisation_pe = null;

    #[ORM\Column]
    private array $inscrit_since = [];

    #[ORM\Column(length: 9)]
    private ?string $pe_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $indemnistaion_type = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $indemnisation_end = null;

    #[ORM\Column]
    private ?bool $is_rsa = null;

    #[ORM\Column]
    private ?bool $is_aah = null;

    #[ORM\Column]
    private ?bool $is_ass = null;

    #[ORM\Column]
    private ?bool $is_aspa = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $other_perception = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ml = null;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $ml_tel = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $advisor = null;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $advisor_tel = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $advisor_mail = null;

    #[ORM\OneToOne(inversedBy: 'employmentSituation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user_id = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function isIsIndemnisationPe(): ?bool
    {
        return $this->is_indemnisation_pe;
    }

    public function setIsIndemnisationPe(bool $is_indemnisation_pe): static
    {
        $this->is_indemnisation_pe = $is_indemnisation_pe;

        return $this;
    }

    public function getInscritSince(): array
    {
        return $this->inscrit_since;
    }

    public function setInscritSince(array $inscrit_since): static
    {
        $this->inscrit_since = $inscrit_since;

        return $this;
    }

    public function getPeId(): ?string
    {
        return $this->pe_id;
    }

    public function setPeId(string $pe_id): static
    {
        $this->pe_id = $pe_id;

        return $this;
    }

    public function getIndemnistaionType(): ?string
    {
        return $this->indemnistaion_type;
    }

    public function setIndemnistaionType(?string $indemnistaion_type): static
    {
        $this->indemnistaion_type = $indemnistaion_type;

        return $this;
    }

    public function getIndemnisationEnd(): ?\DateTimeInterface
    {
        return $this->indemnisation_end;
    }

    public function setIndemnisationEnd(?\DateTimeInterface $indemnisation_end): static
    {
        $this->indemnisation_end = $indemnisation_end;

        return $this;
    }

    public function isRsa(): ?bool
    {
        return $this->is_rsa;
    }

    public function setRsa(bool $rsa): static
    {
        $this->is_rsa = $rsa;

        return $this;
    }

    public function isAah(): ?bool
    {
        return $this->is_aah;
    }

    public function setAah(bool $aah): static
    {
        $this->is_aah = $aah;

        return $this;
    }

    public function isIsAss(): ?bool
    {
        return $this->is_ass;
    }

    public function setIsAss(bool $is_ass): static
    {
        $this->is_ass = $is_ass;

        return $this;
    }

    public function isIsAspa(): ?bool
    {
        return $this->is_aspa;
    }

    public function setIsAspa(bool $is_aspa): static
    {
        $this->is_aspa = $is_aspa;

        return $this;
    }

    public function getOtherPerception(): ?string
    {
        return $this->other_perception;
    }

    public function setOtherPerception(?string $other_perception): static
    {
        $this->other_perception = $other_perception;

        return $this;
    }

    public function getMl(): ?string
    {
        return $this->ml;
    }

    public function setMl(?string $ml): static
    {
        $this->ml = $ml;

        return $this;
    }

    public function getMlTel(): ?string
    {
        return $this->ml_tel;
    }

    public function setMlTel(?string $ml_tel): static
    {
        $this->ml_tel = $ml_tel;

        return $this;
    }

    public function getAdvisor(): ?string
    {
        return $this->advisor;
    }

    public function setAdvisor(?string $advisor): static
    {
        $this->advisor = $advisor;

        return $this;
    }

    public function getAdvisorTel(): ?string
    {
        return $this->advisor_tel;
    }

    public function setAdvisorTel(?string $advisor_tel): static
    {
        $this->advisor_tel = $advisor_tel;

        return $this;
    }

    public function getAdvisorMail(): ?string
    {
        return $this->advisor_mail;
    }

    public function setAdvisorMail(?string $advisor_mail): static
    {
        $this->advisor_mail = $advisor_mail;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->user_id;
    }

    public function setUserId(Users $User_id): static
    {
        $this->user_id = $User_id;

        return $this;
    }
}