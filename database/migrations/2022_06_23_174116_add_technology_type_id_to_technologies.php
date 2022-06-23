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
        Schema::table('technologies', function (Blueprint $table) {
            $table->unsignedBigInteger('technology_type_id')->after('unit_id')->nullable();

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
        Schema::table('technologies', function (Blueprint $table) {
            $table->dropForeign('technology_type_id');
            $table->dropColumn('technology_type_id');
        });
    }
};
