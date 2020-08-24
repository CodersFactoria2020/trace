<?php

namespace Tests\Feature;

use App\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;
use App\Activity;

class ActivitiesTest extends TestCase
{
    use RefreshDatabase;

    public function test_success_response_to_user_authorized()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/activity');

        $response->assertStatus(200);
        $response->assertSeeText('Activitats');
    }

    public function test_redirect_user_not_authorized()
    {
        $response = $this->get('/activity');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
    public function test_admin_can_create_activity()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $file = UploadedFile::fake()->create('document.pdf', 22);
        $response = $this->actingAs($user)->post('/activity', [
            'title'=>'Natació',
            'description'=>'descipció',
            'textColor'=> "#000000",
            'professional1'=>'Paca',
            'file' => $file->name,
        ]);

        $this->assertDatabaseHas('activities', [
            'title'=>'Natació',
            'description'=>'descipció',
            'textColor'=> "#000000",
            'professional1'=>'Paca',
            'file'=> $file->name,
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');

    }
    public function test_admin_can_delete_activity()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $activity = factory(Activity::class)->create([
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descipció',
            'color'=> 'Turquoise',
            'textColor'=> '#000000',
            'professional1'=>'Paca',

        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descipció',
            'color'=> 'Turquoise',
            'textColor'=> '#000000',
            'professional1'=>'Paca',

        ]);
        $response = $this->actingAs($user)->delete('/activity/'.$activity->id);
        $this->assertDatabaseMissing('activities', [
            'id'=> 1,
            'title'=>'Natació', '
            description'=>'descipció',
            'textColor'=> '#000000',
            'professional1'=>'Paca',
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');

    }
    public function test_admin_can_update_activity()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $activity = factory(Activity::class)->create([
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descipció',
            'professional1'=>'Paca'
        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descipció',
            'professional1'=>'Paca'
        ]);
        $response = $this->actingAs($user)->patch('/activity/'.$activity->id, [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descipció',
            'professional1'=>'Paca'
        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descipció',
            'professional1'=>'Paca',
            ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }
    public function test_professional_can_create_activity()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $file = UploadedFile::fake()->create('document.pdf', 22);
        $response = $this->actingAs($user)->post('/activity', [
            'title'=>'Natació',
            'description'=>'descipció',
            'textColor'=> "#000000",
            'professional1'=>'Paca',
            'file' => $file->name,
        ]);

        $this->assertDatabaseHas('activities', [
            'title'=>'Natació',
            'description'=>'descipció',
            'textColor'=> "#000000",
            'professional1'=>'Paca',
            'file'=> $file->name,
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');

    }
    public function test_professional_can_delete_activity()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $activity = factory(Activity::class)->create([
            'id' => 1,
            'title' => 'Natació',
            'description' => 'descipció',
            'color' => 'Turquoise',
            'textColor' => '#000000',
            'professional1' => 'Paca',

        ]);
        $this->assertDatabaseHas('activities', [
            'id' => 1,
            'title' => 'Natació',
            'description' => 'descipció',
            'color' => 'Turquoise',
            'textColor' => '#000000',
            'professional1' => 'Paca',

        ]);
        $response = $this->actingAs($user)->delete('/activity/' . $activity->id);
        $this->assertDatabaseMissing('activities', [
            'id' => 1,
            'title' => 'Natació', '
            description' => 'descipció',
            'textColor' => '#000000',
            'professional1' => 'Paca',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }
    public function test_professional_can_update_activity()
    {
        $role = factory(Role::class)->states('Professioanl')->create();
        $user = factory(User::class)->states('Professional')->create();
        $activity = factory(Activity::class)->create([
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descipció',
            'professional1'=>'Paca'
        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descipció',
            'professional1'=>'Paca'
        ]);
        $response = $this->actingAs($user)->patch('/activity/'.$activity->id, [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descipció',
            'professional1'=>'Paca'
        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descipció',
            'professional1'=>'Paca',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }





}
