<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user2s', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('business_name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('representative');
            $table->string('city');
            $table->string('type');
            $table->boolean('status');
            $table->timestamp('member_since')->nullable();
            $table->string('address');
            $table->tinyInteger('res_range')->nullable();
            $table->smallInteger('duration')->nullable();
            $table->decimal('longitude');
            $table->decimal('latitude');
            $table->decimal('floor_width');
            $table->decimal('floor_length');
            $table->text('description')->nullable();
            $table->string('logo');
            $table->rememberToken();

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
