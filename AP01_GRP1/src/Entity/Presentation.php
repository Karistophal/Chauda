<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PresentationRepository")
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
    * @ORM\Column(type="text", nullable=true)
     */
    private $textePresentation;

    /**
    * @ORM\Column(type="text", nullable=true)
     */
    private $experienceText;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $skillsText;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $certificationsText;

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

    public function getExperienceText(): ?string
    {
        return $this->experienceText;
    }

    public function setExperienceText(string $experienceText): self
    {
        $this->experienceText = $experienceText;

        return $this;
    }

    public function getSkillsText(): ?string
    {
        return $this->skillsText;
    }

    public function setSkillsText(string $skillsText): self
    {
        $this->skillsText = $skillsText;

        return $this;
    }

    public function getCertificationsText(): ?string
    {
        return $this->certificationsText;
    }

    public function setCertificationsText(string $certificationsText): self
    {
        $this->certificationsText = $certificationsText;

        return $this;
    }
}
