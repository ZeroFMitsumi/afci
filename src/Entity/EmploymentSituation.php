<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmploymentSituationRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmploymentSituationRepository::class)]
class EmploymentSituation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $is_pe;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $is_indemnisation_pe;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private \DateTimeInterface $inscrit_since;

    #[ORM\Column(length: 8)]
    #[Assert\Length(min: 8, max: 8)]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    private ?string $pe_id;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 3, max: 255)]
    private ?string $indemnistaion_type;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $indemnisation_end;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $is_rsa;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $is_aah;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $is_ass;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $is_aspa;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(min: 3, max: 100)]
    private ?string $other_perception;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 3, max: 255)]
    private ?string $ml;

    #[ORM\Column(length: 14, nullable: true)]
    #[Assert\Length(min: 10, max: 14)]
    private ?string $ml_tel;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(min: 3, max: 100)]
    private ?string $advisor;

    #[ORM\Column(length: 14, nullable: true)]
    #[Assert\Length(min: 10, max: 14)]
    private ?string $advisor_tel;

    #[ORM\Column(length: 180, nullable: true)]
    #[Assert\Length(min: 3, max: 180)]
    private ?string $advisor_mail;

    #[ORM\OneToOne(inversedBy: 'employmentSituation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $userId;

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

    public function getInscritSince(): \DateTimeInterface
    {
        return $this->inscrit_since;
    }

    public function setInscritSince(\DateTimeInterface $inscrit_since): static
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
        return $this->userId;
    }

    public function setUserId(Users $userId): static
    {
        $this->userId = $userId;

        return $this;
    }
}
