<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/blog/category/');
        $response->assertStatus(404);

        $response = $this->get('/blog/category/first-1705-10-04-2018');
        $response->assertStatus(200);
    }

    public function testApi()
    {
        $r = $this->json('GET', '/api/test');

        $r
            ->assertStatus(200)
            ->assertJson([1, 2, 3])
        ;
    }
}
