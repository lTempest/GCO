<?php

namespace App\Entity;

use App\Repository\EtatsEventsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatsEventsRepository::class)]
class EtatsEvents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\OneToMany(mappedBy: 'etatevents', targetEntity: Events::class)]
    private Collection $etatevents;

    public function __construct()
    {
        $this->etatsevents = new ArrayCollection();
        $this->etatevents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function __toString()
    {
        return $this->etat;
    }

    /**
     * @return Collection<int, Events>
     */
    public function getEtatevents(): Collection
    {
        return $this->etatevents;
    }

    public function addEtatevent(Events $etatevent): self
    {
        if (!$this->etatevents->contains($etatevent)) {
            $this->etatevents->add($etatevent);
            $etatevent->setEtatevents($this);
        }

        return $this;
    }

    public function removeEtatevent(Events $etatevent): self
    {
        if ($this->etatevents->removeElement($etatevent)) {
            // set the owning side to null (unless already changed)
            if ($etatevent->getEtatevents() === $this) {
                $etatevent->setEtatevents(null);
            }
        }

        return $this;
    }
}
