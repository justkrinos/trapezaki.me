<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user2_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('type');
            $table->text('details');
<<<<<<< HEAD
            $table->tinyInteger('status')->default(0);
=======
            $table->boolean('status')->default(0);
            $table->boolean('hidden')->default(0);
>>>>>>> 3ab6e9e01c018ccaa7d0c84e9b4b67bf306be6db
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
        Schema::dropIfExists('issues');
    }
}
