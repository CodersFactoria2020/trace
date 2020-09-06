<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Activity;

class ActivityUnitTest extends TestCase
{
    use RefreshDatabase;
    public function test_T_removed_from_date_string()
    {
        $activity = factory(Activity::class)->create([
            'id'=>'4',
            'title'=>'Passeant per la platja mushooooo',
            'description'=>'jugar a la pilota a la platja',
            'color'=> '#000000',
            'start'=> '2020-09-02T14:20',
            'end'=>'2020-09-02T15:20']);

        $activity->remove_t_from_date($activity->start);
        $date_without_T = '2020-09-02 14:20';
        $this->assertDatabaseHas('activities', ['showStart'=> $date_without_T]);
    }

}
