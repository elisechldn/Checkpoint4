<?php

namespace App\Entity;

use App\Repository\StackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StackRepository::class)]
class Stack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: ProjetWeb::class, mappedBy: 'stacks')]
    private Collection $projetWebs;

    public function __construct()
    {
        $this->projetWebs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, ProjetWeb>
     */
    public function getProjetWebs(): Collection
    {
        return $this->projetWebs;
    }

    public function addProjetWeb(ProjetWeb $projetWeb): static
    {
        if (!$this->projetWebs->contains($projetWeb)) {
            $this->projetWebs->add($projetWeb);
            $projetWeb->addStack($this);
        }

        return $this;
    }

    public function removeProjetWeb(ProjetWeb $projetWeb): static
    {
        if ($this->projetWebs->removeElement($projetWeb)) {
            $projetWeb->removeStack($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}
