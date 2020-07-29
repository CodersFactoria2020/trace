<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class)->create(['fullname' => 'Santiago Ramon y Cajal', 'profession' => 'Director']);
        factory(\App\Team::class,22)->create();
    }
}
