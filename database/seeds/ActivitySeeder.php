<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        factory(\App\Activity::class,12)->create();
    }
}