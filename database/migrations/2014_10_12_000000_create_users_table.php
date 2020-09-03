<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('shown_password')->nullable();
            $table->rememberToken();
            $table->string('phone')->nullable();
            $table->string('dni');
            $table->string('tutor')->nullable();
            $table->foreignId('role_id')->default(3);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
