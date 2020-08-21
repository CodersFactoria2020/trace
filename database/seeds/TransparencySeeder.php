<?php

use Illuminate\Database\Seeder;
use App\Transparency;

class TransparencySeeder extends Seeder
{
    public function run()
    {
        factory(Transparency::class)->create(['date_name' => 'Exercici 2015', 'economic_document'=>'document.pdf','entity_document'=>'docuemnt2.pdf']);
        factory(\App\Transparency::class,4)->create();
    }
}
