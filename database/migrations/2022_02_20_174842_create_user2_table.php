<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user2', function (Blueprint $table) {
            $table->id('user2id');
            $table->string('username');
            $table->string('password');
            $table->string('business_name');
            $table->string('company_name');
            $table->string('email');
            $table->string('phone');
            $table->string('representative');
            $table->string('city');
            $table->string('type');
            $table->boolean('status');
            $table->timestamp('member_since')->nullable();
            $table->string('address');
            $table->tinyInteger('res_range');
            $table->smallInteger('duration');
            $table->decimal('longitude');
            $table->decimal('latitude');
            $table->decimal('floor_width');
            $table->decimal('floor_length');
            $table->text('description');
            $table->string('logo');

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
        Schema::dropIfExists('user2');
    }
}
