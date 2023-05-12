<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Delete;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ActivityEventRepository;
use App\Controller\MyActivityEventController;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\MyActivityEventByCategoryController;

#[ORM\Entity(repositoryClass: ActivityEventRepository::class)]

#[ApiResource(
order: ['id' => 'desc'],
normalizationContext: ['groups' => ['read']],
// normalizationContext: ['groups' => ['read']],
// denormalizationContext: ['groups' => ['write']],

// , operations: [
//   new Get(),
//   new Put(),
//   new Patch(),
//   new Delete(),
//   new GetCollection( name: 'myactivityevent',
//   uriTemplate: '/activity_events/custom/{id}',
//   requirements: ['id' => '\d+'],
//   controller: MyActivityEventController::class),
//   new GetCollection(
//   uriTemplate: '/activity_events/category/{id}',
//   requirements: ['id' => '\w+'],
//   controller: MyActivityEventByCategoryController::class),
//   new Post()]
)]


#[ApiFilter(SearchFilter::class, properties: ['category' => 'exact'])]

class ActivityEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read', 'write'])]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read', 'write'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read', 'write'])]
    private ?string $location = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read', 'write'])]
    private ?string $meetingPoint = null;

    #[ORM\Column]
    #[Groups(['read', 'write'])]
    private ?int $maxOfPeople = null;

    #[ORM\Column]
    #[Groups(['read', 'write'])]
    private ?\DateTimeImmutable $startAt = null;

    #[Groups(['read'])]
    #[ORM\ManyToOne(inversedBy: 'activityEvents')]
    private ?Category $category = null;

    #[Groups(['write', 'read'])]
    #[ORM\ManyToOne(inversedBy: 'activityEvents')]
    private ?User $creator = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $meetingTime = null;

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
        return $this->meetingPoint;
    }

    public function setMeetingPoint(string $meetingPoint): self
    {
        $this->meetingPoint = $meetingPoint;

        return $this;
    }

    public function getMaxOfPeople(): ?int
    {
        return $this->maxOfPeople;
    }

    public function setMaxOfPeople(int $max_of_people): self
    {
        $this->maxOfPeople = $max_of_people;

        return $this;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->startAt;
    }

    public function setStartAt(\DateTimeImmutable $startAt): self
    {
        $this->startAt = $startAt;

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

    public function getMeetingTime(): ?string
    {
        return $this->meetingTime;
    }

    public function setMeetingTime(string $meetingTime): self
    {
        $this->meetingTime = $meetingTime;

        return $this;
    }
}
