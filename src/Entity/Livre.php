<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
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
    private $titre;

    /**
     * @ORM\ManyToMany(targetEntity=Autheur::class, inversedBy="livres")
     */
    private $autheur;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_publication;

    public function __construct()
    {
        $this->autheur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection<int, Autheur>
     */
    public function getAutheur(): Collection
    {
        return $this->autheur;
    }

    public function addAutheur(Autheur $autheur): self
    {
        if (!$this->autheur->contains($autheur)) {
            $this->autheur[] = $autheur;
        }

        return $this;
    }

    public function removeAutheur(Autheur $autheur): self
    {
        $this->autheur->removeElement($autheur);

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->date_publication;
    }

    public function setDatePublication(?\DateTimeInterface $date_publication): self
    {
        $this->date_publication = $date_publication;

        return $this;
    }
}
