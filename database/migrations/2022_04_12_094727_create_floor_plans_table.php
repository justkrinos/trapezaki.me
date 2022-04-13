<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User2;


class CreateFloorPlansTable extends Migration
{
    protected $primaryKey = 'user2_id';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('floor_plans', function (Blueprint $table) {
            $table->id()->foreignId('user2_id')->constrained();
            $table->text('json')->nullable();
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
        Schema::dropIfExists('floor_plans');
    }
}
