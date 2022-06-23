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
        Schema::create('lores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('race_id');
            $table->string('lore')->nullable();
            $table->unsignedBigInteger('population')->nullable();
            $table->string('leadership')->nullable();
            $table->string('disposition')->nullable();
            $table->string('government')->nullable();
            $table->string('quote')->nullable();
            $table->string('flavor_text')->nullable();
            $table->timestamps();

            $table->foreign('race_id')->references('id')->on('races');
        });

        Schema::table('races', function (Blueprint $table) {
            $table->foreign('lore_id')->references('id')->on('lores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lores');

        Schema::table('races', function (Blueprint $table) {
            $table->dropForeign('lore_id');
        });
    }
};
