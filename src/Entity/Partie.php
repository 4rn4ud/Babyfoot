<?php

namespace App\Entity;

use App\Repository\PartieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartieRepository::class)]
class Partie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\ManyToOne(inversedBy: 'parties')]
    private ?Equipe $idRouge = null;

    #[ORM\ManyToOne(inversedBy: 'parties')]
    private ?Equipe $idBleu = null;

    #[ORM\ManyToOne(inversedBy: 'parties')]
    private ?Equipe $idGagnant = null;

    #[ORM\Column]
    private ?int $scoreBleu = 0;

    #[ORM\Column]
    private ?int $scoreRouge = 0;

    #[ORM\Column]
    private ?bool $partieFinie = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getIdRouge(): ?Equipe
    {
        return $this->idRouge;
    }

    public function setIdRouge(Equipe $idRouge): static
    {
        $this->idRouge = $idRouge;

        return $this;
    }

    public function getIdBleu(): ?Equipe
    {
        return $this->idBleu;
    }

    public function setIdBleu(Equipe $idBleu): static
    {
        $this->idBleu = $idBleu;

        return $this;
    }

    public function getIdGagnant(): ?Equipe
    {
        return $this->idGagnant;
    }

    public function setIdGagnant(?Equipe $idGagnant): static
    {
        $this->idGagnant = $idGagnant;

        return $this;
    }

    public function getScoreBleu(): ?int
    {
        return $this->scoreBleu;
    }

    public function setScoreBleu(?int $scoreBleu): static
    {
        $this->scoreBleu = $scoreBleu;

        return $this;
    }

    public function getScoreRouge(): ?int
    {
        return $this->scoreRouge;
    }

    public function setScoreRouge(?int $scoreRouge): static
    {
        $this->scoreRouge = $scoreRouge;

        return $this;
    }

    public function isPartieFinie(): ?bool
    {
        return $this->partieFinie;
    }

    public function setPartieFinie(bool $partieFinie): static
    {
        $this->partieFinie = $partieFinie;

        return $this;
    }
}
