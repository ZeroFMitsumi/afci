<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use App\Entity\Trait\CreatedAtTrait;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    use CreatedAtTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Email]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre email.')]
    private ?string $email;

    #[ORM\Column]
    #[Assert\NotNull]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre mot de passe.')]
    #[Assert\Length(
        min: 8,
        minMessage: 'Votre mot de passe doit contenir au {{ limit }} caracters',
    )]
    private ?string $password;

    #[ORM\Column(length: 100)]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre nom de famille.')]
    private ?string $lastname;

    #[ORM\Column(length: 100)]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre prénom.')]
    private ?string $firstname;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre adresse.')]
    private ?string $address;

    #[ORM\Column(length: 5)]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre code postal.')]
    #[Assert\Length(
        min: 5,
        max: 5,
        minMessage: 'Votre code postal doit contenir {{ limit }} caracters',
        maxMessage: 'Votre code postal doit contenir {{ limit }} caracters',
    )]
    private ?string $zipcode;

    #[ORM\Column(length: 150)]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre ville.')]
    private ?string $city;

    #[ORM\Column(length: 255)]
    #[Assert\NotNull]
    #[Assert\NotBlank(message: 'Entrez votre département.')]
    private ?string $departement;

    #[ORM\Column(length: 14)]
    #[Assert\NotNull]
    #[Assert\Length(
        min: 10,
        max: 14,
        minMessage: 'Votre numéro de téléphone doit contenir {{ limit }} caracters et sans point entre les nombres.',
        maxMessage: 'Votre numéro de téléphone doit contenir {{ limit }} caracters et avec des points entre les nombres.',
    )]
    private ?string $tel;

    #[ORM\Column(length: 14, nullable: true)]
    #[Assert\Length(min: 10, max: 14)]
    private ?string $tel2;

    #[ORM\Column]
    #[Assert\NotNull]
    private ?bool $is_valid;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?InformationSession $session;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?AdminAjout $stagiaireId;

    #[ORM\OneToOne(mappedBy: 'userId', cascade: ['persist', 'remove'])]
    private ?CivilState $civilState;

    #[ORM\OneToOne(mappedBy: 'userId', cascade: ['persist', 'remove'])]
    private ?EmploymentSituation $employmentSituation;

    #[ORM\OneToOne(mappedBy: 'userId', cascade: ['persist', 'remove'])]
    private ?Formation $formation;

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

    public function isIsValid(): ?bool
    {
        return $this->is_valid;
    }

    public function setIsValid(bool $is_valid): static
    {
        $this->is_valid = $is_valid;

        return $this;
    }

    public function getSession(): ?InformationSession
    {
        return $this->session;
    }

    public function setSession(?InformationSession $session): static
    {
        $this->session = $session;

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

    public function getStagiaireId(): ?AdminAjout
    {
        return $this->stagiaireId;
    }

    public function setStagiaire_id($stagiaire_id): self
    {
        $this->stagiaireId = $stagiaire_id;

        return $this;
    }
}
