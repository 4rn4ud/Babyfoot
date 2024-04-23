<?php

namespace App\Entity;

use App\Repository\AppartenirRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartenirRepository::class)]
class Appartenir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'appartenirs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Joueur $idJoueur = null;

    #[ORM\ManyToOne(inversedBy: 'appartenirs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $idEquipe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJoueur(): ?Joueur
    {
        return $this->idJoueur;
    }

    public function setIdJoueur(?Joueur $idJoueur): static
    {
        $this->idJoueur = $idJoueur;

        return $this;
    }

    public function getIdEquipe(): ?Equipe
    {
        return $this->idEquipe;
    }

    public function setIdEquipe(?Equipe $idEquipe): static
    {
        $this->idEquipe = $idEquipe;

        return $this;
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
