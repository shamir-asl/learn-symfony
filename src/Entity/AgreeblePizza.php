<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgreeblePizzaRepository")
 */
class AgreeblePizza
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="dateinterval")
     */
    private $dateDiff;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDateDiff(): ?\DateInterval
    {
        return $this->dateDiff;
    }

    public function setDateDiff(\DateInterval $dateDiff): self
    {
        $this->dateDiff = $dateDiff;

        return $this;
    }
}
