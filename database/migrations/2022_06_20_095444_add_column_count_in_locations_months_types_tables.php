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
        Schema::table('locations', function (Blueprint $table) {
            $table->integer('count')->default(0);
        });
        Schema::table('months', function (Blueprint $table) {
            $table->integer('count')->default(0);
        });
        Schema::table('types', function (Blueprint $table) {
            $table->integer('count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('count');
        });
        Schema::table('months', function (Blueprint $table) {
            $table->dropColumn('count');
        });
        Schema::table('types', function (Blueprint $table) {
            $table->dropColumn('count');
        });
    }
};
