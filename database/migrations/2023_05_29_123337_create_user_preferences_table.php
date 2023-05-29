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
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('first_show_list')->nullable();
            $table->boolean('is_dark_mode')->default(false);
            $table->timestamps();

        });

        Schema::table('user_preferences', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('first_show_list')->references('id')->on('lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_preferences');
    }
};
