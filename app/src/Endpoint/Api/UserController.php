<?php

declare(strict_types=1);

namespace App\Endpoint\Api;

use App\Endpoint\Requests\ConfirmCodeRequest;
use App\Entity\User;
use App\Exception\InvalidCodeException;
use Psr\Http\Message\ResponseInterface;
use Spiral\Http\Exception\ClientException\ForbiddenException;
use Spiral\Prototype\Traits\PrototypeTrait;
use Spiral\Router\Annotation\Route;
use Yiisoft\Http\Status;

class UserController
{
    use PrototypeTrait;

    #[Route(route: '/users/me', name: 'me', methods: 'GET', group: 'api')]
    public function me(): ResponseInterface
    {
        /** @var User $user */
        $user = $this->auth->getActor() ?? throw new ForbiddenException();

        return $this->response->json([
            'id' => $user->getId(),
        ]);
    }
}