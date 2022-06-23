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
        Schema::table('lores', function (Blueprint $table) {
            $table->dropForeign('race_id');
            $table->dropColumn('race_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lores', function (Blueprint $table) {
            $table->unsignedBigInteger('race_id')->after('id');
            $table->foreign('race_id')->references('id')->on('races');
        });
    }
};
