<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource()]
#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userAccount = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    private ?ActivityEvent $activity = null;

    #[ORM\Column(options: ["default" => true], nullable: true)]
    private ?bool $isPending = true;

    #[ORM\Column(options: ["default" => false], nullable: true)]
    private ?bool $isAccepted = false;

    #[ORM\Column(options: ["default" => false], nullable: true)]
    private ?bool $isRejected = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserAccount(): ?User
    {
        return $this->userAccount;
    }

    public function setUserAccount(?User $userAccount): self
    {
        $this->userAccount = $userAccount;

        return $this;
    }

    public function getActivity(): ?ActivityEvent
    {
        return $this->activity;
    }

    public function setActivity(?ActivityEvent $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function isIsPending(): ?bool
    {
        return $this->isPending;
    }

    public function setIsPending(bool $isPending): self
    {
        $this->isPending = $isPending;

        return $this;
    }

    public function isIsAccepted(): ?bool
    {
        return $this->isAccepted;
    }

    public function setIsAccepted(bool $isAccepted): self
    {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    public function isIsRejected(): ?bool
    {
        return $this->isRejected;
    }

    public function setIsRejected(bool $isRejected): self
    {
        $this->isRejected = $isRejected;

        return $this;
    }
}