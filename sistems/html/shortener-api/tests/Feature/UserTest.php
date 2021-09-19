<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * @test
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function createUserTest()
    {
        //$response = $this->post('/login');

        $this->json(
            'POST',
            '/login',
            [
                'email'     => 'admin@admin',
                'password'    => 'admin'
            ]
        )->assertStatus(
            Response::HTTP_OK
        );
    }
}
