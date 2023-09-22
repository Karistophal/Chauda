<?php

namespace App\Entity;

use App\Repository\PresentationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PresentationRepository::class)
 */
class Presentation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $textePresentation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextePresentation(): ?string
    {
        return $this->textePresentation;
    }

    public function setTextePresentation(string $textePresentation): self
    {
        $this->textePresentation = $textePresentation;

        return $this;
    }
}
