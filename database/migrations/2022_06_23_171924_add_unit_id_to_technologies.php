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
        if (Schema::hasColumn('technologies', 'type')) {
            Schema::table('technologies', function (Blueprint $table) {
                $table->dropColumn('type');
            });
        }

        Schema::table('technologies', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id')->after('race_id')->nullable();

            $table->foreign('unit_id')->references('id')->on('units');
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
            $table->dropForeign('unit_id');
            $table->dropColumn('unit_id');
        });
    }
};
