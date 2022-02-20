<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Ta pedia tou table
        Schema::create('user3s', function (Blueprint $table) {
            $table->id(); //user3id, apla iparxei idi method id()
            $table->string('username');
            $table->string('password');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->timestamp('member_since')->nullable();
            $table->boolean('guest');
            $table->boolean('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user3');
    }
}
