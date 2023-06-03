<?php

namespace App\EventListener;


use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class RegistrationSuccessListener implements EventSubscriberInterface
{
    private $eventDispatcher;

    public function __construct(\Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function onKernelRequest(RequestEvent $event)
    {

        $request = $event->getRequest();

        //$authSuccessEvent = new AuthenticationSuccessEvent($data);
        //$this->eventDispatcher->dispatch($authSuccessEvent, 'lexik_jwt_authentication.on_authentication_success');
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.request' => 'onKernelRequest',
        ];
    }
}
