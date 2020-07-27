<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testSuccessResponse()
    {
        $response = $this->get('/activitats');

        $response->assertStatus(200);

        $response->assertSeeText('Activitats');
    }


}
