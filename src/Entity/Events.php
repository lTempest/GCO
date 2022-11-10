<?php

namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventsRepository::class)]
class Events
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column]
    private ?bool $tournament = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Games $game = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_art = null;

    #[ORM\ManyToOne(inversedBy: 'etatevents')]
    private ?EtatsEvents $etatevents = null;

    public function __construct()
    {
        $this->etatsEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }   

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function isTournament(): ?bool
    {
        return $this->tournament;
    }

    public function setTournament(bool $tournament): self
    {
        $this->tournament = $tournament;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getGame(): ?Games
    {
        return $this->game;
    }

    public function setGame(?Games $game): self
    {
        $this->game = $game;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImgArt(): ?string
    {
        return $this->img_art;
    }

    public function setImgArt(?string $img_art): self
    {
        $this->img_art = $img_art;

        return $this;
    }

    public function getEtatevents(): ?EtatsEvents
    {
        return $this->etatevents;
    }

    public function setEtatevents(?EtatsEvents $etatevents): self
    {
        $this->etatevents = $etatevents;

        return $this;
    }
}