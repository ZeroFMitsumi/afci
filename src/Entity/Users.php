<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password;

    #[ORM\Column(length: 100)]
    private ?string $lastname;

    #[ORM\Column(length: 100)]
    private ?string $firstname;

    #[ORM\Column(length: 255)]
    private ?string $address;

    #[ORM\Column(length: 5)]
    private ?string $zipcode;

    #[ORM\Column(length: 150)]
    private ?string $city;

    #[ORM\Column(length: 255)]
    private ?string $departement;

    #[ORM\Column(length: 14)]
    private ?string $tel;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $tel2;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at;

    #[ORM\Column]
    private ?bool $is_valid;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?InformationSession $session;

    #[ORM\OneToOne(mappedBy: 'user_id', cascade: ['persist', 'remove'])]
    private ?CivilState $civilState = null;

    #[ORM\OneToOne(mappedBy: 'user_id', cascade: ['persist', 'remove'])]
    private ?EmploymentSituation $employmentSituation = null;

    #[ORM\OneToOne(mappedBy: 'user_id', cascade: ['persist', 'remove'])]
    private ?Formation $formation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): static
    {
        $this->zipcode = $zipcode;

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

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(?string $tel2): static
    {
        $this->tel2 = $tel2;

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

    public function isIsValid(): ?bool
    {
        return $this->is_valid;
    }

    public function setIsValid(bool $is_valid): static
    {
        $this->is_valid = $is_valid;

        return $this;
    }

    public function getSessionId(): ?InformationSession
    {
        return $this->session;
    }

    public function setSessionId(?InformationSession $session_id): static
    {
        $this->session = $session_id;

        return $this;
    }

    public function getCivilState(): ?CivilState
    {
        return $this->civilState;
    }

    public function setCivilState(CivilState $civilState): static
    {
        // set the owning side of the relation if necessary
        if ($civilState->getUserId() !== $this) {
            $civilState->setUserId($this);
        }

        $this->civilState = $civilState;

        return $this;
    }

    public function getEmploymentSituation(): ?EmploymentSituation
    {
        return $this->employmentSituation;
    }

    public function setEmploymentSituation(EmploymentSituation $employmentSituation): static
    {
        // set the owning side of the relation if necessary
        if ($employmentSituation->getUserId() !== $this) {
            $employmentSituation->setUserId($this);
        }

        $this->employmentSituation = $employmentSituation;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(Formation $formation): static
    {
        // set the owning side of the relation if necessary
        if ($formation->getUserId() !== $this) {
            $formation->setUserId($this);
        }

        $this->formation = $formation;

        return $this;
    }
}
