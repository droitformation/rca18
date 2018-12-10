<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FrontendApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFrontPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testAuteur()
    {
        $response = $this->get('/auteur');
        $response->assertStatus(200);
        $response->assertViewHas('auteurs');
    }

    public function testContact()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }
}
