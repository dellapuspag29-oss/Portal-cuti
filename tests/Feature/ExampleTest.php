<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_homepage_shows_welcome_and_links_to_leave_actions(): void
    {
        $response = $this->get('/');

        $response->assertSee('Selamat datang');
        $response->assertSee('Mulai pengajuan');
        $response->assertSee(route('cuti.public.create'));
        $response->assertSee(route('cuti.public.status'));
    }
}
