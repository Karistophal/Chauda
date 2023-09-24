<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface; //

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(fields={"emailUtil"}, message="Un compte existe déjà avec cet Email")
 */
class Utilisateur implements UserInterface // Implémentez UserInterface
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
     * @return array
     */
    public function getRoles(): array
    {
        // Retournez les rôles de l'utilisateur, par exemple sous forme de tableau
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }

    public function getPassword()
    {
        // Retournez le mot de passe de l'utilisateur
        return $this->mdpUtil;
    }

    public function getUsername()
    {
        // Retournez le nom d'utilisateur de l'utilisateur
        return $this->loginUtil;
    }

    // Les autres méthodes restent inchangées

}
