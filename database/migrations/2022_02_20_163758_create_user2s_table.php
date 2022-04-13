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
            $table->string('address');
            $table->integer('postal');
            $table->double('long',20,15);
            $table->double('lat',20,15);

            $table->string('type');
            $table->boolean('status')->default(false);
            $table->timestamp('member_since')->nullable();

            $table->tinyInteger('res_range')->nullable();
            $table->smallInteger('duration')->nullable();
            $table->string('menu');

            $table->text('description')->nullable();

            //testing
            $table->string('verification_code',25)->nullable();
            $table->integer('is_verified')->default('0');
            //
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
