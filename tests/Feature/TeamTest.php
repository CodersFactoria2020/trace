<?php

namespace Tests\Feature;
use App\Team;
use App\User;
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
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/team');

        $response->assertStatus(200);
    }

    public function test_create_member_team_with_image()
    {
        $user = factory(User::class)->create();
        $photo = UploadedFile::fake()->image('image.jpg');
        $response = $this->actingAs($user)->post('/team', [
            'first_name'=>'Kevin',
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>$photo->name,
    ]);
        $this->assertDatabaseHas('teams',[
        "first_name"=> "Kevin",
        "last_name"=> "Hidalgo",
        "position"=> "Doctor",
        "photo"=> "image.jpg",
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/team');
    }



    public function test_delete_member_team()
    {
        $user = factory(User::class)->create();
        $photo = UploadedFile::fake()->image('image.jpg');
        $team=factory(Team::class)->create([
            'id'=>1,
            'first_name'=>'Kevin',
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>$photo->name,
            ]);
        $this->assertDatabaseHas('teams',[
            'id'=> 1 ,
            "first_name"=> "Kevin",
            "last_name"=> "Hidalgo",
            "position"=> "Doctor",
            "photo"=> 'image.jpg',
        ]);
        $response = $this->actingAs($user)->delete('team/'.$team->id);
        $this->assertDatabaseMissing('teams',[
            'id'=> 1,
            "first_name"=> "Kevin",
            "last_name"=> "Hidalgo",
            "position"=> "Scrum Master",
            "photo"=> $photo,

        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/team');
    }

    public function test_update_member_team_with_image()
    {
        $user = factory(User::class)->create();
        $photo = $file = UploadedFile::fake()->image('image2.jpg');
        $team=factory(Team::class)->create([
            'id'=> 1,
            'first_name'=>'Kevin',
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>$photo->name,
        ]);
        $response = $this->actingAs($user)->patch('/team/'. $team->id, [
            'id'=> 1 ,
            'first_name'=>'Kevin',
            'last_name'=>'Vivar',
            'position' =>'Doctor',
            'photo'=>'image2.jpg',
        ]);
        $this->assertDatabaseHas('teams',[
            "id"=> 1 ,
            "first_name"=> "Kevin",
            "last_name"=> "Vivar",
            "position"=> "Doctor",
            "photo"=> "image2.jpg",
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/team');
    }
}
