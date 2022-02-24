<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_ts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user2_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->smallInteger('x_coord');
            $table->smallInteger('y_coord');
            $table->smallInteger('width');
            $table->smallInteger('length');
            
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
        Schema::dropIfExists('objects');
    }
}
