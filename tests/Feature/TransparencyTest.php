<?php

namespace Tests\Feature;

use App\Role;
use App\Transparency;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class TransparencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_show_all_transparency()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/transparency');

        $response->assertStatus(200);
        $response->assertSee('Documentació econòmica');
    }
    public function test_admin_create_transparency_with_documents()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $economic_document = UploadedFile::fake()->create('_economic.pdf');
        $entity_document = UploadedFile::fake()->create('_entity.pdf');
        $response = $this->actingAs($user)->post('/transparency', [
            'date_name'=>'exercici 2015',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $this->assertDatabaseHas('transparencies',[
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/transparency');
    }
    public function test_admin_delete_transparency_with_document()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $economic_document = UploadedFile::fake()->create('_economic.pdf');
        $entity_document = UploadedFile::fake()->create('_entity.pdf');
        $transparency=factory(Transparency::class)->create([
            'id'=>1,
            'date_name'=>'exercici 2015',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $this->assertDatabaseHas('transparencies',[
            'id'=> 1 ,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $response = $this->actingAs($user)->delete('transparency/'.$transparency->id);
        $this->assertDatabaseMissing('transparencies',[
            'id'=> 1,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/transparency');
    }
    public function test_admin_update_transparency__with_documents()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $economic_document = UploadedFile::fake()->create('_economic.pdf');
        $entity_document = UploadedFile::fake()->create('_entity.pdf');
        $transparency=factory(Transparency::class)->create([
            'id'=>1,
            'date_name'=>'exercici 2015',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $response = $this->actingAs($user)->patch('/transparency/'. $transparency->id, [
            'id'=> 1,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $this->assertDatabaseHas('transparencies',[
            'id'=> 1,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/transparency');
    }

    public function test_soci_cant_show_all_transparency()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $response = $this->actingAs($user)->get('/transparency');

        $response->assertStatus(403);
    }

    public function test_soci_cant_create_transparency_with_documents()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $economic_document = UploadedFile::fake()->create('_economic.pdf');
        $entity_document = UploadedFile::fake()->create('_entity.pdf');
        $response = $this->actingAs($user)->post('/transparency', [
            'date_name'=>'exercici 2015',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $response->assertStatus(403);

    }
    public function test_soci_cant_delete_transparency_with_document()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $economic_document = UploadedFile::fake()->create('exercici_2020_economic.pdf');
        $entity_document = UploadedFile::fake()->create('exercici_2020_entity.pdf');
        $transparency=factory(Transparency::class)->create([
            'date_name'=>'exercici 2020',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $this->assertDatabaseHas('transparencies',[
            'date_name'=>'exercici 2020',
            'economic_document'=>'exercici_2020_economic.pdf',
            'entity_document'=>'exercici_2020_entity.pdf',
        ]);

        $response = $this->actingAs($user)->delete('transparency/'.$transparency->id);
        $this->assertDatabaseMissing('transparencies',[
            'id'=> 1,
            'date_name'=>'exercici 2020',
            'economic_document'=>'exercici_2020_economic.pdf',
            'entity_document'=>'exercici_2020_entity.pdf',
            "created_at"=> "2020-08-31 13:11:13",
            "updated_at"=> "2020-08-31 13:11:13",
        ]);

        $response->assertStatus(403);
    }

    public function test_soci_cant_update_transparency_with_documents()
    {
        $role = factory(Role::class)->states('Soci')->create();
        $user = factory(User::class)->states('Soci')->create();
        $economic_document = UploadedFile::fake()->create('_economic.pdf');
        $entity_document = UploadedFile::fake()->create('_entity.pdf');
        $transparency=factory(Transparency::class)->create([
            'id'=>1,
            'date_name'=>'exercici 2015',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $response = $this->actingAs($user)->patch('/transparency/'. $transparency->id, [
            'id'=> 1,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $this->assertDatabaseHas('transparencies',[
            'id'=> 1,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $response->assertStatus(403);
    }

    public function test_professional_show_all_transparency()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $response = $this->actingAs($user)->get('/transparency');

        $response->assertStatus(200);
    }

    public function test_professional_cant_create_transparency_with_documents()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $economic_document = UploadedFile::fake()->create('_economic.pdf');
        $entity_document = UploadedFile::fake()->create('_entity.pdf');
        $response = $this->actingAs($user)->post('/transparency', [
            'date_name'=>'exercici 2015',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $response->assertStatus(403);
    }

    public function test_professional_cant_delete_transparency_with_document()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $economic_document = UploadedFile::fake()->create('exercici_2020_economic.pdf');
        $entity_document = UploadedFile::fake()->create('exercici_2020_entity.pdf');
        $transparency=factory(Transparency::class)->create([
            'date_name'=>'exercici 2020',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $this->assertDatabaseHas('transparencies',[
            'date_name'=>'exercici 2020',
            'economic_document'=>'exercici_2020_economic.pdf',
            'entity_document'=>'exercici_2020_entity.pdf',
        ]);

        $response = $this->actingAs($user)->delete('transparency/'.$transparency->id);
        $this->assertDatabaseMissing('transparencies',[
            'id'=> 1,
            'date_name'=>'exercici 2020',
            'economic_document'=>'exercici_2020_economic.pdf',
            'entity_document'=>'exercici_2020_entity.pdf',
            "created_at"=> "2020-08-31 13:11:13",
            "updated_at"=> "2020-08-31 13:11:13",
        ]);

        $response->assertStatus(403);
    }

    public function test_professional_cant_update_transparency_with_documents()
    {
        $role = factory(Role::class)->states('Professional')->create();
        $user = factory(User::class)->states('Professional')->create();
        $economic_document = UploadedFile::fake()->create('_economic.pdf');
        $entity_document = UploadedFile::fake()->create('_entity.pdf');
        $transparency=factory(Transparency::class)->create([
            'id'=>1,
            'date_name'=>'exercici 2015',
            'economic_document'=>$economic_document->name,
            'entity_document'=>$entity_document->name,
        ]);

        $response = $this->actingAs($user)->patch('/transparency/'. $transparency->id, [
            'id'=> 1,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $this->assertDatabaseHas('transparencies',[
            'id'=> 1,
            'date_name'=>'exercici 2015',
            'economic_document'=>'_economic.pdf',
            'entity_document'=>'_entity.pdf',
        ]);

        $response->assertStatus(403);
    }
}
