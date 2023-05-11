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
class MyActivityEventController extends  AbstractController
{
  public function __construct(private SerializerInterface $serializer)
    {
    }
  public function __invoke($id, EntityManagerInterface $em): JsonResponse
  {
    $activityEvent = $em->getRepository(ActivityEvent::class)->findOneBy(["id" => $id]);


      $customActivityEvent = array(
        "id" => $activityEvent->getId(),
        "title" => $activityEvent->getTitle(),
        "description" => $activityEvent->getDescription(),
        "location" => $activityEvent->getLocation(),
        "meeting_point" => $activityEvent->getMeetingPoint(),
        "max_of_people" => $activityEvent->getMaxOfPeople(),
        "start_at" => $activityEvent->getStartAt(),
        "category" => $activityEvent->getCategory(),
        "creator" => $activityEvent->getCreator(),

      );


    $activityEventJson = $this->serializer->serialize(array("status"=> 1, "activityEvent"=>$customActivityEvent), 'json');



    if(!$activityEvent) {
      return new JsonResponse(
        array("status"=>0, "profile"=>$activityEventJson));
    } else {
      return new JsonResponse(
        $activityEventJson, 200, array(), true);
    }

    }


  }
