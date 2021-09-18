<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function createUserTest()
    {
        $user = factory(User::class)->make();
        $this->assertDatabaseHas('users', [
            'email' => $user->email
        ]);
    }
}
