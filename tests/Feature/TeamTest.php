<?php

namespace Tests\Feature;
use App\Team;
use App\User;
use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;


class TeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_all_teams()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/team');

        $response->assertStatus(200);
    }

    public function test_admin_create_member_team_with_image()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
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

    public function test_admin_delete_member_team()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
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
            "photo"=> 'image.jpg',

        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/team');
    }

    public function test_admin_update_member_team_with_image()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
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

    public function test_professional_cant_view_all_teams()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get('/team');

        $response->assertStatus(403);
    }

    public function test_soci_cant_update_member_team_with_image(){
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
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
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>'image2.jpg',
        ]);
        $this->assertDatabaseHas('teams',[
            "id"=> 1 ,
            "first_name"=> "Kevin",
            "last_name"=> "Hidalgo",
            "position"=> "Doctor",
            "photo"=> "image2.jpg",
        ]);
        $response->assertStatus(403);
    }
    public function test_soci_cant_delete_member_team_with_image(){
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
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
            "photo"=> 'image.jpg',

        ]);

        $response->assertStatus(403);
    }

    public function test_soci_cant_create_member_team_with_image()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $photo = UploadedFile::fake()->image('image.jpg');
        $response = $this->actingAs($user)->post('/team', [
            'first_name'=>'Kevin',
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>$photo->name,
        ]);

        $response->assertStatus(403);
    }

    public function test_professional_cant_update_member_team_with_image(){
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
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
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>'image2.jpg',
        ]);
        $this->assertDatabaseHas('teams',[
            "id"=> 1 ,
            "first_name"=> "Kevin",
            "last_name"=> "Hidalgo",
            "position"=> "Doctor",
            "photo"=> "image2.jpg",
        ]);
        $response->assertStatus(403);
    }

    public function test_professional_cant_delete_member_team_with_image(){
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
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
            "photo"=> 'image.jpg',

        ]);

        $response->assertStatus(403);
    }

    public function test_professional_cant_create_member_team_with_image()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $photo = UploadedFile::fake()->image('image.jpg');
        $response = $this->actingAs($user)->post('/team', [
            'first_name'=>'Kevin',
            'last_name'=>'Hidalgo',
            'position' =>'Doctor',
            'photo'=>$photo->name,
        ]);

        $response->assertStatus(403);
    }
}
