<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparenciesTable extends Migration
{
    public function up()
    {
        Schema::create('transparencies', function (Blueprint $table) {
            $table->id();
            $table->string('date_name');
            $table->string('economic_document')->nullable();
            $table->string('entity_document')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transparencies');
    }
}
