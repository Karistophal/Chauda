<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $nomUtil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomUtil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailUtil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loginUtil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdpUtil;

    /**
     * @ORM\Column(type="integer")
     */
    private $droitUtil;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="idUtilAvis")
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="idUtilContact")
     */
    private $contacts;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtil(): ?string
    {
        return $this->nomUtil;
    }

    public function setNomUtil(string $nomUtil): self
    {
        $this->nomUtil = $nomUtil;

        return $this;
    }

    public function getPrenomUtil(): ?string
    {
        return $this->prenomUtil;
    }

    public function setPrenomUtil(string $prenomUtil): self
    {
        $this->prenomUtil = $prenomUtil;

        return $this;
    }

    public function getEmailUtil(): ?string
    {
        return $this->emailUtil;
    }

    public function setEmailUtil(string $emailUtil): self
    {
        $this->emailUtil = $emailUtil;

        return $this;
    }

    public function getLoginUtil(): ?string
    {
        return $this->loginUtil;
    }

    public function setLoginUtil(string $loginUtil): self
    {
        $this->loginUtil = $loginUtil;

        return $this;
    }

    public function getMdpUtil(): ?string
    {
        return $this->mdpUtil;
    }

    public function setMdpUtil(string $mdpUtil): self
    {
        $this->mdpUtil = $mdpUtil;

        return $this;
    }

    public function getDroitUtil(): ?int
    {
        return $this->droitUtil;
    }

    public function setDroitUtil(int $droitUtil): self
    {
        $this->droitUtil = $droitUtil;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setIdUtilAvis($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getIdUtilAvis() === $this) {
                $avi->setIdUtilAvis(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setIdUtilContact($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getIdUtilContact() === $this) {
                $contact->setIdUtilContact(null);
            }
        }

        return $this;
    }
}
