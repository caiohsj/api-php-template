<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{

    public function testUnauthorized()
    {
        $client = $this->post('/api/v1/sign_in', [
            'email' => '',
            'password' => ''
        ]);

        $this->assertEquals(
            $client->response->getStatusCode(), 401
        );
    }
}
