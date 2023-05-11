<?php

namespace App\Controller;

use App\Entity\ActivityEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

#[AsController]
class MyActivityEventByCategoryController extends  AbstractController
{
  public function __construct(private SerializerInterface $serializer)
    {
    }


    public function __invoke($categoryId, EntityManagerInterface $em): JsonResponse
    {
        $activityEvents = $em->getRepository(ActivityEvent::class)->findBy(["id" => $categoryId]);

        if (!$activityEvents) {
            return new JsonResponse(
                ['status' => 0, 'message' => 'No activity events found for the given category.'],
                JsonResponse::HTTP_NOT_FOUND
            );
        }

        $customActivityEvents = [];

        foreach ($activityEvents as $activityEvent) {
            $customActivityEvent = [
                'id' => $activityEvent->getId(),
                'title' => $activityEvent->getTitle(),
                'description' => $activityEvent->getDescription(),
                'location' => $activityEvent->getLocation(),
                'meeting_point' => $activityEvent->getMeetingPoint(),
                'max_of_people' => $activityEvent->getMaxOfPeople(),
                'start_at' => $activityEvent->getStartAt(),
                'category' => $activityEvent->getCategory(),
                'creator' => $activityEvent->getCreator(),
            ];

            $customActivityEvents[] = $customActivityEvent;
        }

        $activityEventsJson = $this->serializer->serialize(
            ['status' => 1, 'activityEvents' => $customActivityEvents],
            'json'
        );

        return new JsonResponse($activityEventsJson, JsonResponse::HTTP_OK, [], true);
    }
  }
