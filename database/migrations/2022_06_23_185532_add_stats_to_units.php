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
        Schema::table('units', function (Blueprint $table) {
            $table->unsignedTinyInteger('cost')->after('level')->nullable();
            $table->unsignedTinyInteger('combat')->after('cost')->nullable();
            $table->unsignedTinyInteger('move')->after('combat')->nullable();
            $table->unsignedTinyInteger('capacity')->after('move')->nullable();
            $table->string('ability')->after('capacity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn('cost');
            $table->dropColumn('combat');
            $table->dropColumn('move');
            $table->dropColumn('capacity');
            $table->dropColumn('ability');
        });
    }
};
