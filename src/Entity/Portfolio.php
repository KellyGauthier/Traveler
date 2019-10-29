<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PortfolioRepository")
 */
class Portfolio
{
    use BaseEntityTrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FilePath;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Legende;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateImage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voyage", inversedBy="portfolios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;


    public function getFilePath(): ?string
    {
        return $this->FilePath;
    }

    public function setFilePath(string $FilePath): self
    {
        $this->FilePath = $FilePath;

        return $this;
    }


    public function getLegende(): ?string
    {
        return $this->Legende;
    }

    public function setLegende(?string $Legende): self
    {
        $this->Legende = $Legende;

        return $this;
    }

    public function getDateImage(): ?\DateTimeInterface
    {
        return $this->DateImage;
    }

    public function setDateImage(?\DateTimeInterface $DateImage): self
    {
        $this->DateImage = $DateImage;

        return $this;
    }

    public function getVoyage(): ?Voyage
    {
        return $this->voyage;
    }

    public function setVoyage(?Voyage $voyage): self
    {
        $this->voyage = $voyage;

        return $this;
    }
}
