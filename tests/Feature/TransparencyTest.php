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



    public function test_show_all_transparency()
    {
        $role = factory(Role::class)->states('Admin')->create();
        $user = factory(User::class)->states('Admin')->create();
        $response = $this->actingAs($user)->get('/transparency');

        $response->assertStatus(200);
        //->assertSee('Documentacio Econmica');
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
}
