<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRedirectedWithNoLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserRedirectedWithNoLogin()
    {
        $response = $this->get('/home');

        $response->assertRedirect(route('login'));
    }
}
