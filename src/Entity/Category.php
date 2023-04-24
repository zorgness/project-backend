<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ApiResource(order: ['name' => 'asc'])]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $url_image = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: ActivityEvent::class)]
    private Collection $activityEvents;

    public function __construct()
    {
        $this->activityEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): self
    {
        $this->url_image = $url_image;

        return $this;
    }

    /**
     * @return Collection<int, ActivityEvent>
     */
    public function getActivityEvents(): Collection
    {
        return $this->activityEvents;
    }

    public function addActivityEvent(ActivityEvent $activityEvent): self
    {
        if (!$this->activityEvents->contains($activityEvent)) {
            $this->activityEvents->add($activityEvent);
            $activityEvent->setCategory($this);
        }

        return $this;
    }

    public function removeActivityEvent(ActivityEvent $activityEvent): self
    {
        if ($this->activityEvents->removeElement($activityEvent)) {
            // set the owning side to null (unless already changed)
            if ($activityEvent->getCategory() === $this) {
                $activityEvent->setCategory(null);
            }
        }

        return $this;
    }
}
