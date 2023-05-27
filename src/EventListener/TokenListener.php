<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class TokenListener implements EventSubscriberInterface
{
    private $jwtManager;

    public function __construct(JWTTokenManagerInterface $jwtManager)
    {
        $this->jwtManager = $jwtManager;
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        // Verificar que la respuesta sea una respuesta válida.
        if (!$response instanceof Response) {
            return;
        }

        // Obtener el cuerpo de la respuesta.
        $body = $response->getContent();

        // Decodificar el objeto JSON del cuerpo de la respuesta.
        $data = json_decode($body, true);

        // Verificar si el objeto JSON contiene una clave 'token' y obtener su valor.
        $token = isset($data['token']) ? $data['token'] : null;

        // Establecer el valor del token en el encabezado 'Authorization' de la siguiente solicitud.
        if ($token) {
            $jwt = $this->jwtManager->create($token);
            $event->getRequest()->headers->set('Authorization', 'Bearer ' . $jwt);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.response' => 'onKernelResponse',
        ];
    }
}
