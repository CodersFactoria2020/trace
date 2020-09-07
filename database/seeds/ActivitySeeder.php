<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        factory(Activity::class,10)->create();
    }
}
