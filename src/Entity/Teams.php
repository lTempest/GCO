<?php

namespace App\Entity;

use App\Repository\TeamsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamsRepository::class)]
class Teams
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_team = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo_team = null;

    #[ORM\OneToMany(mappedBy: 'team', targetEntity: Players::class, orphanRemoval: true)]
    private Collection $players;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tag_team = null;

    #[ORM\ManyToOne(inversedBy: 'teams')]
    private ?Games $games = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTeam(): ?string
    {
        return $this->name_team;
    }

    public function setNameTeam(string $name_team): self
    {
        $this->name_team = $name_team;

        return $this;
    }

    public function getLogoTeam(): ?string
    {
        return $this->logo_team;
    }

    public function setLogoTeam(?string $logo_team): self
    {
        $this->logo_team = $logo_team;

        return $this;
    }

    /**
     * @return Collection<int, Players>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Players $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players->add($player);
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Players $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name_team;
    }

    public function getTagTeam(): ?string
    {
        return $this->tag_team;
    }

    public function setTagTeam(?string $tag_team): self
    {
        $this->tag_team = $tag_team;

        return $this;
    }

    public function getGames(): ?Games
    {
        return $this->games;
    }

    public function setGames(?Games $games): self
    {
        $this->games = $games;

        return $this;
    }
}
