<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        factory(Category::class)->create(['category_name'=>'Fisioteràpia neurològica', 'description'=>'Descripció de Fisioteràpia neurològica', 'category_color'=>'#84c9e6']);
        factory(Category::class)->create(['category_name'=>'Neurologopèdia', 'description'=>'Descripció de Neurologopèdia', 'category_color'=>'#ebf556']);
        factory(Category::class)->create(['category_name'=>'Teràpia ocupacional', 'description'=>'Descripció de Teràpia ocupacional', 'category_color'=>'#af8abc']);
        factory(Category::class)->create(['category_name'=>'Neuropsicologia', 'description'=>'Descripció de Neuropsicologia', 'category_color'=>'#ff9a4d']);
        factory(Category::class)->create(['category_name'=>'GNPT i NEURONUP', 'description'=>'Descripció de GNPT i NEURONUP', 'category_color'=>'#f9cdda']);
        factory(Category::class)->create(['category_name'=>'Grupals', 'description'=>'Descripció de Grupals', 'category_color'=>'#35f631']);
    }
}