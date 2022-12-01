<?php

namespace App\Entity;

use App\Repository\CategorieAdherentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieAdherentRepository::class)]
class CategorieAdherent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'categorieAdherents')]
    private ?Adherent $adherents = null;

    #[ORM\ManyToOne(inversedBy: 'categorieAdherents')]
    private ?Categorie $categories = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdherents(): ?Adherent
    {
        return $this->adherents;
    }

    public function setAdherents(?Adherent $adherents): self
    {
        $this->adherents = $adherents;

        return $this;
    }

    public function getCategories(): ?Categorie
    {
        return $this->categories;
    }

    public function setCategories(?Categorie $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}
