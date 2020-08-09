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
            $table->string('title');
            $table->text('description');
            $table->string('color',20);
            $table->string('textColor',20);
            $table->mediumText('file')->nullable();
            $table->string('professional1');
            $table->string('professional2')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('category_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
}