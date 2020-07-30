<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivityTable extends Migration
{

    public function up()
    {
        Schema::create('user_activity', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_activity');
    }
}
