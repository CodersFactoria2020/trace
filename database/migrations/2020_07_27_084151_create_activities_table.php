<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->mediumText('file')->nullable();
            $table->string('professional');
            $table->date('date');
            $table->time('time');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
