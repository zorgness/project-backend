<?php

namespace App\Controller;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

#[AsController]
class MyUserController extends  AbstractController
{
  public function __construct(private SerializerInterface $serializer)
    {
    }
  public function __invoke($id, EntityManagerInterface $em): JsonResponse
  {
    $user = $em->getRepository(User::class)->findOneBy(["id" => $id]);


      $customUser = array(
        "id" => $user->getId(),
        "username" => $user->getUsername(),
        "email" => $user->getEmail(),
        "city" => $user->getCity(),
        "description" => $user->getDescription(),
        "imageUrl" => $user->getImageUrl(),
        "activities" => $user->getActivityEvents()

      );


    $userJson = $this->serializer->serialize(array("status"=>"success", "profile"=>$customUser), 'json');



    if(!$user) {
      return new JsonResponse(
        array("status"=>"error", "profile"=>$userJson));
    } else {
      return new JsonResponse(
        $userJson, 200, array(), true);
    }

    }


  }
