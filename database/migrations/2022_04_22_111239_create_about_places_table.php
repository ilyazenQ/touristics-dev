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
        Schema::create('about_types', function (Blueprint $table) {
            // Тип поля (Общая информация, для детей, и др)
            $table->id();
            $table->text('title');
            $table->timestamps();
        });

        Schema::create('about_modes', function (Blueprint $table) {
            // Модификатор поля (Множественный выбор, единичный)
            $table->id();
            $table->text('title');
            $table->timestamps();
        });

        Schema::create('about_places', function (Blueprint $table) {
            // Поля выбираемые пользователем
            $table->id();
            $table->text('title');

            $table->unsignedBigInteger('about_type_id');
            $table->foreign('about_type_id')
                ->references('id')
                ->on('about_types')->onDelete('cascade');
            $table->unsignedBigInteger('about_mod_id');
            $table->foreign('about_mod_id')
                ->references('id')
                ->on('about_modes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('user_fill_about_places', function (Blueprint $table) {
            // Поля заполняемые пользователем
            $table->id();
            $table->text('stock')->nullable();
            $table->string('check-in')->nullable();
            $table->string('check-out')->nullable();
            $table->string('build')->nullable();
            $table->string('rebuild')->nullable();
            $table->string('documents')->nullable();
            $table->string('room-fund')->nullable();
            $table->string('conference-hall-fund')->nullable();
            $table->string('restaurant-fund')->nullable();

            $table->text('cooking')->nullable();
            $table->text('cooking-price')->nullable();

            $table->string('breakfast-start')->nullable();
            $table->string('breakfast-end')->nullable();


            $table->unsignedBigInteger('place_id')->nullable();
//            $table->foreign('place_id')
//                ->references('id')
//                ->on('places')->onDelete('cascade');
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
        Schema::dropIfExists('about_types');
        Schema::dropIfExists('about_modes');
        Schema::dropIfExists('about_places');
        Schema::dropIfExists('user_fill_about_places');


    }
};
