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
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('on_map')->nullable();
            $table->string('distance_to')->nullable();
            $table->integer('price')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('stars')->default(0);

            $table->integer('is_published')->default(0);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('social_place_id');
            $table->foreign('social_place_id')
                ->references('id')
                ->on('social_places')->onDelete('cascade');
            $table->unsignedBigInteger('user_fill_id');
            $table->foreign('user_fill_id')
                ->references('id')
                ->on('user_fill_about_places')->onDelete('cascade');

            $table->foreignId('state_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('place_id')->nullable();
            $table->foreign('place_id')
                ->references('id')
                ->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("place_id");
        });
    }
};
