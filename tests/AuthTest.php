<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{

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
        $user = [
            'email' => 'johndoe@email.com',
            'password' => 'my_pass'
        ];

        $response = $this->post('/api/v1/sign_in', $user)->response;

        $this->assertEquals(
            $response->getStatusCode(), 200
        );

    }
}
