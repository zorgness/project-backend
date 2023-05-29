<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ActivityEventRepository;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ActivityEventRepository::class)]

#[ApiResource(
order: ['id' => 'desc'],
normalizationContext: ['groups' => ['read']],
denormalizationContext:['groups' => ['write']])]

#[ApiFilter(SearchFilter::class, properties: ['category' => 'exact', 'creator' => 'exact'])]

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

    #[Groups(['write','read'])]
    #[ORM\ManyToOne(inversedBy: 'activityEvents')]
    private ?Category $category = null;

    #[Groups(['write', 'read'])]
    #[ORM\ManyToOne(inversedBy: 'activityEvents')]
    private ?User $creator = null;

    #[Groups(['read', 'write'])]
    #[ORM\Column(length: 255)]
    private ?string $meetingTime = null;

    #[Groups(['write'])]
    #[ORM\OneToMany(mappedBy: 'activity', targetEntity: Booking::class, cascade: ["remove"])]
    private Collection $bookings;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
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

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings->add($booking);
            $booking->setActivity($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getActivity() === $this) {
                $booking->setActivity(null);
            }
        }

        return $this;
    }
}
