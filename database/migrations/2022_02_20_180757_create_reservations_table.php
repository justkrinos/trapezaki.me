<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('pax');
            $table->foreignId('table_id');//->constrained();//->onDelete('cascade')->onUpdate('cascade');
            $table->date('date');
            $table->time('time'); //integer gia na mporw efkola na to sigkrinw
            $table->text('details');
            $table->smallInteger('attended')->default(0);
            $table->foreignId('user3_id')->constrained('user3s')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('reservations');
    }
}
