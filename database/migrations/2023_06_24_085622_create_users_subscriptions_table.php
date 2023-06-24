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
        Schema::create('users_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('subscription_level_id')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });

        Schema::table('users_subscriptions', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('subscription_level_id')->references('id')->on('subscription_levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table ('users_subscriptions', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['subscription_level_id']);
        });
        Schema::dropIfExists('users_subscriptions');
    }
};
