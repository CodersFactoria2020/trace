<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description');
            $table->string('color', 20)->nullable();
            $table->string('textColor', 20);
            $table->string('professional1');
            $table->string('professional2')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->foreignId('category_id')->default(6);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

   public function down()
    {
        Schema::dropIfExists('events');
    }
}
