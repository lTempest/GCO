<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamesRepository::class)]
class Games
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_game = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_game = null;

    #[ORM\OneToMany(mappedBy: 'game', targetEntity: Events::class)]
    private Collection $events;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attach = null;

    #[ORM\OneToMany(mappedBy: 'games', targetEntity: Teams::class)]
    private Collection $teams;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->teams = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameGame(): ?string
    {
        return $this->name_game;
    }

    public function setNameGame(string $name_game): self
    {
        $this->name_game = $name_game;

        return $this;
    }

    public function getImgGame(): ?string
    {
        return $this->img_game;
    }

    public function setImgGame(?string $img_game): self
    {
        $this->img_game = $img_game;

        return $this;
    }

    /**
     * @return Collection<int, Events>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Events $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setGame($this);
        }

        return $this;
    }

    public function removeEvent(Events $event): self
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getGame() === $this) {
                $event->setGame(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name_game;
    }

    public function getAttach(): ?string
    {
        return $this->attach;
    }

    public function setAttach(?string $attach): self
    {
        $this->attach = $attach;

        return $this;
    }

    /**
     * @return Collection<int, Teams>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Teams $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams->add($team);
            $team->setGames($this);
        }

        return $this;
    }

    public function removeTeam(Teams $team): self
    {
        if ($this->teams->removeElement($team)) {
            // set the owning side to null (unless already changed)
            if ($team->getGames() === $this) {
                $team->setGames(null);
            }
        }

        return $this;
    }
}
