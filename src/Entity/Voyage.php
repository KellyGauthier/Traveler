<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoyageRepository")
 */
class Voyage
{
    use BaseEntityTrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titre;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date;

    /**
     * @ORM\Column(type="integer")
     */
    private $Kilometres;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Destination", inversedBy="voyages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_destination;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Portfolio", mappedBy="ID_Voyage", orphanRemoval=true)
     */
    private $portfolios;

    public function __construct()
    {
        $this->portfolios = new ArrayCollection();
    }


    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): self
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getKilometres(): ?int
    {
        return $this->Kilometres;
    }

    public function setKilometres(int $Kilometres): self
    {
        $this->Kilometres = $Kilometres;

        return $this;
    }

    public function getIDDestination(): ?Destination
    {
        return $this->ID_destination;
    }

    public function setIDDestination(?Destination $ID_destination): self
    {
        $this->ID_destination = $ID_destination;

        return $this;
    }

    /**
     * @return Collection|Portfolio[]
     */
    public function getPortfolios(): Collection
    {
        return $this->portfolios;
    }

    public function addPortfolio(Portfolio $portfolio): self
    {
        if (!$this->portfolios->contains($portfolio)) {
            $this->portfolios[] = $portfolio;
            $portfolio->setIDVoyage($this);
        }

        return $this;
    }

    public function removePortfolio(Portfolio $portfolio): self
    {
        if ($this->portfolios->contains($portfolio)) {
            $this->portfolios->removeElement($portfolio);
            // set the owning side to null (unless already changed)
            if ($portfolio->getIDVoyage() === $this) {
                $portfolio->setIDVoyage(null);
            }
        }

        return $this;
    }


}
