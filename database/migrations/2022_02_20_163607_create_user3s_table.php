<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Ta pedia tou table
        //Exume to created_at mesa sto database ara efia to member since
        Schema::create('user3s', function (Blueprint $table) {
            $table->id()->from(1000);
            $table->string('username')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('city')->nullable();
            $table->boolean('guest')->default(False);
            $table->boolean('status')->default(False);

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
