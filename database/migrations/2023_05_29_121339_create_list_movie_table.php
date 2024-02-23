<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_list_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();
        });

        Schema::table('list_movies', function (Blueprint $table){
            $table->foreign('user_list_id')->references('id')->on('lists');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_movies');
    }
};
