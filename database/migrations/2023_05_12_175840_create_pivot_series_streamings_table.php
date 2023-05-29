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
        Schema::create('pivot_series_streamings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('series_id');
            $table->unsignedBigInteger('streaming_id');
        });

        Schema::table('pivot_series_streamings', function (Blueprint $table){
            $table->foreign('series_id')->references('id')->on('series');
            $table->foreign('streaming_id')->references('id')->on('streamings');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pivot_series_streamings');
    }
};
