<?php

namespace App\Entity;

use App\Repository\EntrainementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrainementRepository::class)]
class Entrainement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $jour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureFin = null;

    #[ORM\ManyToMany(targetEntity: Categorie::class)]
    private Collection $categorie;

    #[ORM\ManyToMany(targetEntity: Terrain::class)]
    private Collection $terrain;

    #[ORM\ManyToMany(targetEntity: StaffPersonnel::class, inversedBy: 'entrainements')]
    private Collection $staffPersonnel;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
        $this->terrain = new ArrayCollection();
        $this->staffPersonnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?int
    {
        return $this->jour;
    }

    public function setJour(int $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie->add($categorie);
        }

        return $this;
    }

    public function removeCategorie(Categorie $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }

    /**
     * @return Collection<int, Terrain>
     */
    public function getTerrain(): Collection
    {
        return $this->terrain;
    }

    public function addTerrain(Terrain $terrain): self
    {
        if (!$this->terrain->contains($terrain)) {
            $this->terrain->add($terrain);
        }

        return $this;
    }

    public function removeTerrain(Terrain $terrain): self
    {
        $this->terrain->removeElement($terrain);

        return $this;
    }

    /**
     * @return Collection<int, StaffPersonnel>
     */
    public function getStaffPersonnel(): Collection
    {
        return $this->staffPersonnel;
    }

    public function addStaffPersonnel(StaffPersonnel $staffPersonnel): self
    {
        if (!$this->staffPersonnel->contains($staffPersonnel)) {
            $this->staffPersonnel->add($staffPersonnel);
        }

        return $this;
    }

    public function removeStaffPersonnel(StaffPersonnel $staffPersonnel): self
    {
        $this->staffPersonnel->removeElement($staffPersonnel);

        return $this;
    }

   
    
}
