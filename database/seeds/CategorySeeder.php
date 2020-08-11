<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        factory(Category::class)->create(['category_name'=>'Fisioteràpia neurològica', 'description'=>'Descripció de Fisioteràpia neurològica']);
        factory(Category::class)->create(['category_name'=>'Neurologopèdia', 'description'=>'Descripció de Neurologopèdia']);
        factory(Category::class)->create(['category_name'=>'Teràpia ocupacional', 'description'=>'Descripció de Teràpia ocupacional']);
        factory(Category::class)->create(['category_name'=>'Neuropsicologia', 'description'=>'Descripció de Neuropsicologia']);
        factory(Category::class)->create(['category_name'=>'GNPT i NEURONUP', 'description'=>'Descripció de GNPT i NEURONUP']);
        factory(Category::class)->create(['category_name'=>'Grupals', 'description'=>'Descripció de Grupals']);
    }
}