<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $sujetContact;

    /**
     * @ORM\Column(type="text")
     */
    private $messageContact;

    /**
     * @ORM\ManyToOne(targetEntity=utilisateur::class, inversedBy="contacts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtilContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujetContact(): ?string
    {
        return $this->sujetContact;
    }

    public function setSujetContact(string $sujetContact): self
    {
        $this->sujetContact = $sujetContact;

        return $this;
    }

    public function getMessageContact(): ?string
    {
        return $this->messageContact;
    }

    public function setMessageContact(string $messageContact): self
    {
        $this->messageContact = $messageContact;

        return $this;
    }

    public function getIdUtilContact(): ?utilisateur
    {
        return $this->idUtilContact;
    }

    public function setIdUtilContact(?utilisateur $idUtilContact): self
    {
        $this->idUtilContact = $idUtilContact;

        return $this;
    }
}
