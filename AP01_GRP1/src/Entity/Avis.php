<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titreAvis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $texteAvis;

    /**
     * @ORM\Column(type="integer")
     */
    private $noteAvis;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtilAvis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreAvis(): ?string
    {
        return $this->titreAvis;
    }

    public function setTitreAvis(string $titreAvis): self
    {
        $this->titreAvis = $titreAvis;

        return $this;
    }

    public function getTexteAvis(): ?string
    {
        return $this->texteAvis;
    }

    public function setTexteAvis(string $texteAvis): self
    {
        $this->texteAvis = $texteAvis;

        return $this;
    }

    public function getNoteAvis(): ?int
    {
        return $this->noteAvis;
    }

    public function setNoteAvis(int $noteAvis): self
    {
        $this->noteAvis = $noteAvis;

        return $this;
    }

    public function getIdUtilAvis(): ?utilisateur
    {
        return $this->idUtilAvis;
    }

    public function setIdUtilAvis(?utilisateur $idUtilAvis): self
    {
        $this->idUtilAvis = $idUtilAvis;

        return $this;
    }
}
