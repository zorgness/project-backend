<?php

namespace App\EventListener;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class RegistrationListener
{
    private $jwtManager;

    public function __construct(JWTTokenManagerInterface $jwtManager)
    {
        $this->jwtManager = $jwtManager;
    }

    // public function onRegistrationSuccess(FilterUserResponseEvent $event)
    // {
    //     $user = $event->getUser();
    //     $token = $this->jwtManager->create($user);

    //     $response = $event->getResponse();
    //     $response->headers->set('Authorization', 'Bearer ' . $token);
    // }
}
