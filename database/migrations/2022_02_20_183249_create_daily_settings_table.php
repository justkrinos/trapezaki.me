<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user2_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('day_id');
            $table->smallInteger('time_min');
            $table->smallInteger('time_max');
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
        Schema::dropIfExists('daily_settings');
    }
}
