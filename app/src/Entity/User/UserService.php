<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\User;
use Spiral\Prototype\Annotation\Prototyped;
use Spiral\Prototype\Traits\PrototypeTrait;

#[Prototyped('userService')]
class UserService
{
    use PrototypeTrait;

    public function findOrRegister(
        string $phone,
        ?string $referredBy = null,
    ): User {
        $user = $this->userRepository->findByPhone($phone);
        if ($user !== null) {
            return $user;
        }

        $user = new User(
            phone: $phone,
            referredBy: $referredBy
        );

        $this->userRepository->save($user);

        return $user;
    }
}