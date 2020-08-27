<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplansTable extends Migration
{
   public function up()
    {
        Schema::create('workplans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->default(6);
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreignId('user_id')->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workplans');
    }
}