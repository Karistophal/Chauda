<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationRepository::class)
 */
class Prestation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libPrestation;

    /**
     * @ORM\Column(type="text")
     */
    private $descPrestation;

    /**
     * @ORM\Column(type="float")
     */
    private $prixHT;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTTC;

    /**
     * @ORM\Column(type="integer")
     */
    private $mainOeuvre;

    /**
     * @ORM\Column(type="float")
     */
    private $dureePrestation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $idPresta)
    {
        $this->id = $idPresta;

        return $this;
    }

    public function getLibPrestation(): ?string
    {
        return $this->libPrestation;
    }

    public function setLibPrestation(string $libPrestation): self
    {
        $this->libPrestation = $libPrestation;

        return $this;
    }

    public function getDescPrestation(): ?string
    {
        return $this->descPrestation;
    }

    public function setDescPrestation(string $descPrestation): self
    {
        $this->descPrestation = $descPrestation;

        return $this;
    }

    public function getPrixHT(): ?float
    {
        return $this->prixHT;
    }

    public function setPrixHT(float $prixHT): self
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    public function getPrixTTC(): ?float
    {
        return $this->prixTTC;
    }

    public function setPrixTTC(float $prixTTC): self
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    public function getMainOeuvre(): ?int
    {
        return $this->mainOeuvre;
    }

    public function setMainOeuvre(int $mainOeuvre): self
    {
        $this->mainOeuvre = $mainOeuvre;

        return $this;
    }

    public function getDureePrestation(): ?float
    {
        return $this->dureePrestation;
    }

    public function setDureePrestation(float $dureePrestation): self
    {
        $this->dureePrestation = $dureePrestation;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
