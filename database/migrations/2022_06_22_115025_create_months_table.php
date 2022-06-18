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
        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('months_places', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('month_id');
            $table->foreign('month_id')
                ->references('id')
                ->on('months')->onDelete('cascade');
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')
                ->references('id')
                ->on('places')->onDelete('cascade');
            $table->integer('price')->nullable();
            $table->timestamps();
        });

        Schema::create('months_rooms', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('month_id');
            $table->foreign('month_id')
                ->references('id')
                ->on('months')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')->onDelete('cascade');
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('months');
        Schema::dropIfExists('months_places');
        Schema::dropIfExists('months_rooms');
    }
};
