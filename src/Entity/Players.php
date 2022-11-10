<?php

namespace App\Entity;

use App\Repository\PlayersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayersRepository::class)]
class Players
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationality = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teams $team = null;

    #[ORM\Column(length: 255)]
    private ?string $photograph = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Twitter = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Twitch = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getTeam(): ?Teams
    {
        return $this->team;
    }

    public function setTeam(?Teams $team): self
    {
        $this->team = $team;

        return $this;
    }

    public function getPhotograph(): ?string
    {
        return $this->photograph;
    }

    public function setPhotograph(string $photograph): self
    {
        $this->photograph = $photograph;

        return $this;
    }

    public function getTwitter(): ?string
    {
        return $this->Twitter;
    }

    public function setTwitter(?string $Twitter): self
    {
        $this->Twitter = $Twitter;

        return $this;
    }

    public function getTwitch(): ?string
    {
        return $this->Twitch;
    }

    public function setTwitch(?string $Twitch): self
    {
        $this->Twitch = $Twitch;

        return $this;
    }
}
