<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        factory(Activity::class)->create(['id'=>1,'name'=>'Hola', 'description'=>'Hola TraCERs', 'professional'=>'Paca', 'date'=>'2020-04-01', 'time'=>'13:05']);
        factory(Activity::class)->create(['id'=>2,'name'=>'Holaa', 'description'=>'Hola TraCERs', 'professional'=>'Paco', 'date'=>'2020-04-01', 'time'=>'13:05']);
        factory(Activity::class)->create(['id'=>3,'name'=>'Holaaa', 'description'=>'Hola TraCERs', 'professional'=>'Paquito', 'date'=>'2020-04-01', 'time'=>'13:05']);
    }
}
