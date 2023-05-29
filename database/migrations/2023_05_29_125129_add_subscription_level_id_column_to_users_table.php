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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('subscription_level_id')->unsigned()->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('subscription_level_id')->references('id')->on('subscription_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['subscription_level_id']);
                $table->dropColumn('subscription_level_id');
        });
    }
};
