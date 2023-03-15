<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('connection');
            $table->longText('payload');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->morphs('tokenable');
            $table->string('token', 64)->unique();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('id_forein')->references('id')->on('forein-table'); //clave foranea
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
