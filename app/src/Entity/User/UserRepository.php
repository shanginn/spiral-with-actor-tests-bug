<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\User;
use Cycle\ORM\Select\Repository;
use Spiral\Auth\ActorProviderInterface;
use Spiral\Auth\TokenInterface;
use Spiral\Prototype\Annotation\Prototyped;

/**
 * @template T of User
 *
 * @extends Repository<T>
 */
#[Prototyped('userRepository')]
final class UserRepository extends Repository implements ActorProviderInterface
{
    public function getActor(TokenInterface $token): ?User
    {
        $phone = $token->getPayload()['phone'] ?? null;
        if ($phone === null) {
            return null;
        }

        return parent::findOne([
            'phone' => $phone,
        ]);
    }
}
