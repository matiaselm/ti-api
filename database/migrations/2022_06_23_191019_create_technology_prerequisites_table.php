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
        Schema::dropIfExists('prerequisites');
        Schema::create('technology_prerequisites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('technology_type_id');
            $table->timestamps();

            $table->foreign('technology_id')->references('id')->on('technologies');
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
        Schema::dropIfExists('technology_prerequisites');
    }
};
