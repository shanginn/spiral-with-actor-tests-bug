<?php

namespace Database\Factory;

use App\Entity\User;
use Spiral\DatabaseSeeder\Factory\AbstractFactory;
use Spiral\DatabaseSeeder\Factory\FactoryInterface;

/**
 * @implements FactoryInterface<User>
 */
final class UserFactory extends AbstractFactory
{
    public function entity(): string
    {
        return User::class;
    }

    public function makeEntity(array $definition): User
    {
        return new User(
            phone: $definition['phone'],
            id: $definition['id'],
        );
    }

    public function definition(): array
    {
        return [
            'phone'      => $this->faker->phoneNumber(),
            'id'         => $this->faker->uuid(),
        ];
    }
}