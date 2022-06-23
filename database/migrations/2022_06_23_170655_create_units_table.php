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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('race_id')->nullable();
            $table->string('name');
            $table->string('type');
            $table->unsignedTinyInteger('level')->default(1);
            $table->timestamps();

            $table->foreign('race_id')->references('id')->on('races');
        });

        Schema::create('unit_abilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->string('name');
            $table->string('effect');
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units');
        });

        Schema::create('prerequisites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('technology_type_id');
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('technology_type_id')->references('id')->on('technology_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
        Schema::dropIfExists('unit_abilities');
        Schema::dropIfExists('prerequisites');
    }
};
