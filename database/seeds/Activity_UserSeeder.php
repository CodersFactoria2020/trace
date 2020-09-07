<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Activity;

class Activity_UserSeeder extends Seeder
{
    public function run()
    {
        $activities = Activity::all();
        foreach ($activities as $activity) {
            $users = User::where('role_id', 1)->inRandomOrder()->get();
            $activity->users()->sync([$users[0]->id, $users[1]->id]                
            );
        }
    }
}
