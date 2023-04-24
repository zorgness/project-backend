<?php

namespace App\Entity;

use App\Repository\ActivityEventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityEventRepository::class)]
class ActivityEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    private ?string $meeting_point = null;

    #[ORM\Column]
    private ?int $max_of_people = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $start_at = null;

    #[ORM\ManyToOne(inversedBy: 'activityEvents')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'activityEvents')]
    private ?User $creator = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getMeetingPoint(): ?string
    {
        return $this->meeting_point;
    }

    public function setMeetingPoint(string $meeting_point): self
    {
        $this->meeting_point = $meeting_point;

        return $this;
    }

    public function getMaxOfPeople(): ?int
    {
        return $this->max_of_people;
    }

    public function setMaxOfPeople(int $max_of_people): self
    {
        $this->max_of_people = $max_of_people;

        return $this;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->start_at;
    }

    public function setStartAt(\DateTimeImmutable $start_at): self
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }
}
