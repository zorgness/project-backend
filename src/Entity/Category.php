<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ApiResource(order: ['id' => 'asc'],
normalizationContext: ['groups' => ['read']] )]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]
    private ?string $urlImage = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: ActivityEvent::class)]
    #[Groups(['read'])]
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
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): self
    {
        $this->urlImage = $urlImage;

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
