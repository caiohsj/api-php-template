<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    public function testUnauthorized()
    {
        $response = $this->post('/api/v1/sign_in', [
            'email' => '',
            'password' => ''
        ])->response;

        $this->assertEquals(
            $response->getStatusCode(), 401
        );
    }

    public function testAuthorized()
    {
        $user_params = [
            'email' => 'johndoe@email.com',
            'password' => 'my_pass'
        ];

        User::factory()->create($user_params);

        $response = $this->post('/api/v1/sign_in', $user_params)->response;

        $this->assertEquals(
            $response->getStatusCode(), 200
        );

    }
}
