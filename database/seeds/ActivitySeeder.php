<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        // factory(\App\Activity::class,12)->create();
        factory(Activity::class)->create(['title' => 'Fisioteràpia neurològica', 'description' => 'Descripció de Fisioteràpia neurològica', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Selma', 'category_id' => '1']);
        factory(Activity::class)->create(['title' => 'Neurologopèdia', 'description' => 'Descripció de Neurologopèdia', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Victoria', 'category_id' => '2']);
        factory(Activity::class)->create(['title' => 'Teràpia ocupacional', 'description' => 'Descripció de Teràpia ocupacional', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'per confirmar', 'category_id' => '3']);
        factory(Activity::class)->create(['title' => 'Neuropsicologia', 'description' => 'Descripció de Neuropsicologia', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'per confirmar', 'category_id' => '4']);
        factory(Activity::class)->create(['title' => 'GNPT i NEURONUP', 'description' => 'Descripció de Neuropsicologia', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'per confirmar', 'category_id' => '5']);
        
        factory(Activity::class)->create(['title' => 'Youtubers', 'description' => 'Parlem de Youtubers', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Anna', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Grup disàrtria 1', 'description' => 'Descripció de disàrtria 1', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Anna', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Grup disàrtria 2', 'description' => 'Descripció de disàrtria 2', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Anna', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Tertúlia', 'description' => 'Avui xerrem de...', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'per confirmar', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Impressió 3D', 'description' => 'Descripció de Impressió 3D', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Nico', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Punt de Mira', 'description' => 'Descripció de Punt de Mira', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Sara F.', 'professional2' => 'Vicky', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Som voluntaris', 'description' => 'Descripció de Som voluntaris', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Sara F.', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Club de lectura Dijous', 'description' => 'Descripció de Club de lectura Dijous', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Anna', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Passejades per Barcelona', 'description' => 'Descripció de Passejades per Barcelona', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Sara F.', 'professional2' => 'Mario', 'category_id' => '6']);        
        factory(Activity::class)->create(['title' => 'Re-aprenem', 'description' => 'Descripció de Re-aprenem', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Sara F.', 'professional2' => 'Laia', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Cos en Moviment', 'description' => 'Descripció de Cos en Moviment', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Sara A.', 'professional2' => 'Mario', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Club de lectura fàcil', 'description' => 'Descripció de lectura fàcil', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Mario', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Club de lectura 2', 'description' => 'Descripció de lectura 2', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Anna', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Cant i veu', 'description' => 'Descripció de Cant i veu', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Vicky', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Anglès', 'description' => 'Descripció de Anglès', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Tina', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Neurogym', 'description' => 'Descripció de Neurogym', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Laia', 'professional2' => 'Tina', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Filosofà', 'description' => 'Descripció de Filosofà', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Tina', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Puja a l\'escenari', 'description' => 'Descripció de Puja a l\'escenari', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Tina', 'professional2' => 'Mario', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Informática básica', 'description' => 'Descripció de Informática básica', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Nico', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Cibercafé', 'description' => 'Descripció de Cibercafé', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Nico', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Ús del mòbil', 'description' => 'Descripció de Ús del mòbil', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Nico', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Hort', 'description' => 'Descripció de Hort', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Sara A.', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Batec del Cervell', 'description' => 'Descripció de Batec del Cervell', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Estefanía', 'professional2' => 'Sara A.', 'professional2' => 'Tina', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Grup d\'afàsia 1', 'description' => 'Descripció de Grup d\'afàsia 1', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Vicky', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Grup d\'afàsia 2', 'description' => 'Descripció de Grup d\'afàsia 2', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Vicky', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Tablets i comunicació', 'description' => 'Descripció de Tablets i comunicació', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'Vicky', 'category_id' => '6']);
        factory(Activity::class)->create(['title' => 'Grup de Funcions executives', 'description' => 'Descripció de Grup de Funcions executives', 'color' => 'green', 'textColor' => 'black', 'professional1' => 'per confirmar', 'category_id' => '6']);
    }
}