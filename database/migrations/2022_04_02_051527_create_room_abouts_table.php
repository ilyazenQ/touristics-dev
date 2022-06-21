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

        Schema::create('about_room_types', function (Blueprint $table) {
            // Тип поля (Общая информация, для детей, и др)
            $table->id();
            $table->text('title');
            $table->timestamps();
        });

        Schema::create('about_room_modes', function (Blueprint $table) {
            // Модификатор поля (Множественный выбор, единичный)
            $table->id();
            $table->text('title');
            $table->timestamps();
        });

        Schema::create('room_abouts', function (Blueprint $table) {
            // Поля выбираемые пользователем
            $table->id();
            $table->text('title');

            $table->unsignedBigInteger('about_type_id');
            $table->foreign('about_type_id')
                ->references('id')
                ->on('about_room_types')->onDelete('cascade');
            $table->unsignedBigInteger('about_mod_id');
            $table->foreign('about_mod_id')
                ->references('id')
                ->on('about_room_modes')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('user_fill_about_rooms', function (Blueprint $table) {
            // Поля заполняемые пользователем
            $table->id();
            $table->string('beds')->nullable();
            $table->string('area')->nullable();

            $table->unsignedBigInteger('room_id')->nullable();
//            $table->foreign('room_id')
//                ->references('id')
//                ->on('rooms')->onDelete('cascade');
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
        Schema::dropIfExists('room_abouts');
        Schema::dropIfExists('user_fill_about_rooms');
        Schema::dropIfExists('about_room_types');
        Schema::dropIfExists('about_room_modes');
    }
};
