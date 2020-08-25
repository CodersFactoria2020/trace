<?php

use Illuminate\Database\Seeder;
use App\Activity;
use App\User;

class WorkplanSeeder extends Seeder
{
    public function run()
    {
        $activities = Activity::all();
        foreach ($activities as $activity) {
            $users = User::where('role_id', 1)->inRandomOrder()->take(2)->get();
            $activity->users()->sync([$users[0]->id, $users[1]->id]                
            );
        }
    }
}