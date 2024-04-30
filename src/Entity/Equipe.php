<?php

namespace App\Entity;

use App\Entity\Partie;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slogan = null;

    /**
     * @var Collection<int, Appartenir>
     */
    #[ORM\OneToMany(targetEntity: Appartenir::class, mappedBy: 'idEquipe')]
    private Collection $appartenirs;

    /**
     * @var Collection<int, Partie>
     */
    #[ORM\OneToMany(targetEntity: Partie::class, mappedBy: 'idBleu')]
    private Collection $parties;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    public function __construct()
    {
        $this->appartenirs = new ArrayCollection();
        $this->parties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): static
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * @return Collection<int, Appartenir>
     */
    public function getAppartenirs(): Collection
    {
        return $this->appartenirs;
    }

    public function addAppartenir(Appartenir $appartenir): static
    {
        if (!$this->appartenirs->contains($appartenir)) {
            $this->appartenirs->add($appartenir);
            $appartenir->setIdEquipe($this);
        }

        return $this;
    }

    public function removeAppartenir(Appartenir $appartenir): static
    {
        if ($this->appartenirs->removeElement($appartenir)) {
            // set the owning side to null (unless already changed)
            if ($appartenir->getIdEquipe() === $this) {
                $appartenir->setIdEquipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Partie>
     */
    public function getParties(): Collection
    {
        return $this->parties;
    }

    public function addPartie(Partie $partie): static
    {
        if (!$this->parties->contains($partie)) {
            $this->parties->add($partie);
            $partie->setIdBleu($this);
        }

        return $this;
    }

    // public function removePartie(Partie $partie): static
    // {
    //     if ($this->parties->removeElement($partie)) {
    //         // set the owning side to null (unless already changed)
    //         if ($partie->getIdBleu() === $this) {
    //             $partie->setIdBleu(null);
    //         }
    //     }

    //     return $this;
    // }

    public function __toString(): string
    {
        return $this->nom;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
}
