<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopularitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popularities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender');
            $table->unsignedInteger('receiver');
            $table->integer('value');
            $table->timestamps();

            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('popularities');
    }
}
