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

    public function test_admin_can_view_all_activities()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/activity');

        $response->assertStatus(200);
        $response->assertSeeText('Activitats');
    }
    public function test_admin_can_view_one_activity()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $activity = factory(Activity::class)->create();

        $response = $this->get('/activity/' . $activity->id);

        $response->assertStatus(302);
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
            'description'=>'descripció',
            'textColor'=> "#000000",
            'file' => $file->name,
        ]);

        $this->assertDatabaseHas('activities', [
            'title'=>'Natació',
            'description'=>'descripció',
            'textColor'=> "#000000",
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
            'description'=>'descripció',
            'color'=> 'Turquoise',
            'textColor'=> '#000000',

        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descripció',
            'color'=> 'Turquoise',
            'textColor'=> '#000000',

        ]);
        $response = $this->actingAs($user)->delete('/activity/'.$activity->id);
        $this->assertDatabaseMissing('activities', [
            'id'=> 1,
            'title'=>'Natació', '
            description'=>'descripció',
            'textColor'=> '#000000',
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
            'description'=>'descripció',

        ]);
        $response = $this->actingAs($user)->patch('/activity/'.$activity->id, [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descripció',
            'socis'=>[]
        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descripció',

            ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }
    public function test_professional_can_view_all_activities()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->get('/activity');

        $response->assertStatus(200);
        $response->assertSeeText('Activitats');
    }
    public function test_professional_can_view_one_activity()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $activity = factory(Activity::class)->create();

        $response = $this->get('/activity/' . $activity->id);

        $response->assertStatus(302);
    }
    public function test_professional_can_create_activity()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $file = UploadedFile::fake()->create('document.pdf', 22);
        $response = $this->actingAs($user)->post('/activity', [
            'title'=>'Natació',
            'description'=>'descripció',
            'textColor'=> "#000000",
            'file' => $file->name,
        ]);

        $this->assertDatabaseHas('activities', [
            'title'=>'Natació',
            'description'=>'descripció',
            'textColor'=> "#000000",
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
            'description' => 'descripció',
            'color' => 'Turquoise',
            'textColor' => '#000000',

        ]);
        $this->assertDatabaseHas('activities', [
            'id' => 1,
            'title' => 'Natació',
            'description' => 'descripció',
            'color' => 'Turquoise',
            'textColor' => '#000000',

        ]);
        $response = $this->actingAs($user)->delete('/activity/' . $activity->id);
        $this->assertDatabaseMissing('activities', [
            'id' => 1,
            'title' => 'Natació', '
            description' => 'descipció',
            'textColor' => '#000000',

        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }
    public function test_professional_can_update_activity()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user1 = factory(User::class)->states('Professional')->create();
        $user2 = factory(User::class)->states('Professional')->create();
        $activity = factory(Activity::class)->create([
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descripció',
        ]);

        $response = $this->actingAs($user1)->patch('/activity/'.$activity->id, [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descripció',
            'socis'=>[$user1->id, $user2->id],
        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descripció',
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/activity');
    }
    public function test_soci_cannot_view_all_activities()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get('/activity');

        $response->assertStatus(403);
    }

    public function test_soci_can_view_one_category()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $activity = factory(Activity::class)->create();
        $response = $this->get('/activity/' . $activity->id);

        $response->assertStatus(302);
    }
    public function test_soci_cannot_create_activity()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $file = UploadedFile::fake()->create('document.pdf', 22);
        $response = $this->actingAs($user)->post('/activity', [
            'title'=>'Natació',
            'description'=>'descripció',
            'textColor'=> "#000000",
            'file' => $file->name,
        ]);

        $response->assertStatus(403);

    }
    public function test_soci_cannot_update_activity()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $activity = factory(Activity::class)->create([
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descripció',
        ]);
        $response = $this->actingAs($user)->patch('/activity/'.$activity->id, [
            'id'=> 1,
            'title'=>'Equitació',
            'description'=>'descripció',
        ]);
        $this->assertDatabaseHas('activities', [
            'id'=> 1,
            'title'=>'Natació',
            'description'=>'descripció',
        ]);
        $response->assertStatus(403);

    }
    public function test_soci_cannot_delete_activity()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $activity = factory(Activity::class)->create([
            'id' => 1,
            'title' => 'Natació',
            'description' => 'descripció',
            'color' => 'Turquoise',
            'textColor' => '#000000',

        ]);
        $this->assertDatabaseHas('activities', [
            'id' => 1,
            'title' => 'Natació',
            'description' => 'descripció',
            'color' => 'Turquoise',
            'textColor' => '#000000',

        ]);
        $response = $this->actingAs($user)->delete('/activity/' . $activity->id);
        $this->assertDatabaseMissing('activities', [
            'id' => 1,
            'title' => 'Natació', '
            description' => 'descripció',
            'textColor' => '#000000',

        ]);
        $response->assertStatus(403);
    }





}
