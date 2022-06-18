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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->integer('price')->default(0);
            $table->integer('is_published')->default(0);

            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')
                ->references('id')
                ->on('places')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('room_types')->onDelete('cascade');
            $table->unsignedBigInteger('user_fill_id');
            $table->foreign('user_fill_id')
                ->references('id')
                ->on('user_fill_about_rooms')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('room_room_about', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('room_about_id');
            $table->foreign('room_about_id')
                ->references('id')
                ->on('room_abouts')->onDelete('cascade');
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('room_room_about');
    }
};
