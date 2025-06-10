<?php

namespace Tests\Endpoint\Api;

use App\Endpoint\Api\UserController;
use App\Entity\User;
use Database\Factory\UserFactory;
use Spiral\Testing\Http\FakeHttp;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    private FakeHttp $http;

    protected function setUp(): void
    {
        parent::setUp();

        $this->http = $this->fakeHttp();
    }

    public function testMe()
    {
        /** @var User $user */
        $user = UserFactory::new()->createOne();

        $this->http
            ->withActor($user)
            ->get('/users/me')
            ->assertOk()
            ->assertBodyContains('phone');
    }
}
