<?php

namespace Tests\Feature;
use App\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;


class TeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_all_team()
    {
        $response = $this->get('/team');

        $response->assertStatus(200);
    }

    public function test_create_team_with_admin()
    {
        $response = $this->get('/team/create');
        $response->assertStatus(200);
    }

    public function test_upload_photo_with_team()
    {
        Storage::fake('public');

        $data = [
            'fullname'=> 'Carlos Hidalgo',
            'profession' =>'Pedagogo',
            'photo' => UploadedFile::fake()->image('image.jpg',50,50)
        ];
        $this->postJson(route('team.store'),$data)
            ->assertStatus(200);

    }
}
