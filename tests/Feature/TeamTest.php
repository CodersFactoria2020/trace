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

    public function test_create_member_team_with_image()
    {
        $photo = UploadedFile::fake()->image('image.jpg');
        $response=$this->post('/team', [
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
        $response= $this->delete('team/'.$team->id);
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
        $photo = $file = UploadedFile::fake()->image('image2.jpg');
        $team=factory(Team::class)->create([
            'id'=> 1,
            'first_name'=>'Kevin',
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>$photo->name,
        ]);
        $response=$this->patch('/team/'. $team->id, [
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
