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
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
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
    public function test_activity_is_created()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $file = UploadedFile::fake()->create('document.pdf', 22);
        $response = $this->actingAs($user)->post('/activity', [
            'title'=>'Natació',
            'description'=>'descipció',
            "textColor"=> "#000000",
            'file' => $file,
            'professional1'=>'Paca',
            'category_id' => 3,

        $this->assertDatabaseHas('activities', ['title'=>'Natació', 'description'=>'descipció', "textColor"=> "#000000", 'professional1'=>'Paca', 'file'=> $file, 'category_id' => 3])]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');

    }
    public function test_activity_is_deleted()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $activity = factory(Activity::class)->create(['id'=> 1,'title'=>'Natació', 'description'=>'descipció', "textColor"=> "#000000", 'professional1'=>'Paca']);
        $this->assertDatabaseHas('activities', ['id'=> 1,'title'=>'Natació', 'description'=>'descipció', "textColor"=> "#000000", 'professional'=>'Paca']);
        $response = $this->actingAs($user)->delete('/activity/'.$activity->id);
        $this->assertDatabaseMissing('activities', ['id'=> 1,'name'=>'Natació', 'description'=>'descipció', "textColor"=> "#000000", 'professional'=>'Paca', 'date'=>'2020-01-02', 'time'=>'13:00']);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');

    }
    public function test_activity_is_updated()
    {
        $role = factory(Role::class)->create();
        $user = factory(User::class)->states('admin')->create();
        $activity = factory(Activity::class)->create(['id'=> 1,'title'=>'Natació', 'description'=>'descipció','professional1'=>'Paca']);
        $this->assertDatabaseHas('activities', ['id'=> 1,'title'=>'Natació', 'description'=>'descipció','professional'=>'Paca']);
        $response = $this->actingAs($user)->patch('/activity/'.$activity->id, ['id'=> 1,'name'=>'Equitació', 'description'=>'descipció','professional'=>'Paca']);
        $this->assertDatabaseHas('activities', ['id'=> 1,'name'=>'Equitació', 'description'=>'descipció','professional'=>'Paca', 'date'=>'2020-01-02', 'time'=>'13:00']);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }




}
