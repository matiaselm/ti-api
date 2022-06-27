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
        Schema::create('anomaly_effects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anomaly_id');
            $table->string('effect', 500);
            $table->timestamps();

            $table->foreign('anomaly_id')->references('id')->on('anomalies');
        });

        Schema::table('anomalies', function(Blueprint $table) {
            $table->dropColumn('effect');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anomaly_effects');

        Schema::table('anomalies', function(Blueprint $table) {
            $table->string('effect')->after('type');
        });
    }
};
