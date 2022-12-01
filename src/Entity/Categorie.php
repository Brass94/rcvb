<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $ageMini = null;

    #[ORM\Column]
    private ?int $ageMaxi = null;

    #[ORM\ManyToMany(targetEntity: Pole::class)]
    private Collection $pole;

    #[ORM\OneToMany(mappedBy: 'categories', targetEntity: CategorieAdherent::class)]
    private Collection $categorieAdherents;

    public function __construct()
    {
        $this->pole = new ArrayCollection();
        $this->adherents = new ArrayCollection();
        $this->categorieAdherents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAgeMini(): ?int
    {
        return $this->ageMini;
    }

    public function setAgeMini(int $ageMini): self
    {
        $this->ageMini = $ageMini;

        return $this;
    }

    public function getAgeMaxi(): ?int
    {
        return $this->ageMaxi;
    }

    public function setAgeMaxi(int $ageMaxi): self
    {
        $this->ageMaxi = $ageMaxi;

        return $this;
    }

    /**
     * @return Collection<int, Pole>
     */
    public function getPole(): Collection
    {
        return $this->pole;
    }

    public function addPole(Pole $pole): self
    {
        if (!$this->pole->contains($pole)) {
            $this->pole->add($pole);
        }

        return $this;
    }

    public function removePole(Pole $pole): self
    {
        $this->pole->removeElement($pole);

        return $this;
    }

    /**
     * @return Collection<int, CategorieAdherent>
     */
    public function getCategorieAdherents(): Collection
    {
        return $this->categorieAdherents;
    }

    public function addCategorieAdherent(CategorieAdherent $categorieAdherent): self
    {
        if (!$this->categorieAdherents->contains($categorieAdherent)) {
            $this->categorieAdherents->add($categorieAdherent);
            $categorieAdherent->setCategories($this);
        }

        return $this;
    }

    public function removeCategorieAdherent(CategorieAdherent $categorieAdherent): self
    {
        if ($this->categorieAdherents->removeElement($categorieAdherent)) {
            // set the owning side to null (unless already changed)
            if ($categorieAdherent->getCategories() === $this) {
                $categorieAdherent->setCategories(null);
            }
        }

        return $this;
    }

    
}

