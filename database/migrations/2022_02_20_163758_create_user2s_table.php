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
            //Tuto iparxei sto created_at TODO na allaksei sta docs
            //$table->timestamp('member_since')->nullable();


            //TODO na men eshi default, na en nullable
            //j na prp na ta allassei o admin
            //note: to 90 simenei 1:30 wra
            $table->tinyInteger('res_range')->default(30);///->nullable();
            $table->smallInteger('duration')->default(90);//->nullable();
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
