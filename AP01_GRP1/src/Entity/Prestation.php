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
     * @ORM\GeneratedValue
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

    public function getId(): ?int
    {
        return $this->id;
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
}
