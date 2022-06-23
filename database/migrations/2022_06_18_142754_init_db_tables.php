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
 
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('number');
            $table->boolean('is_anomaly')->default(0);
            $table->boolean('is_home')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('system_id');
            $table->string('name');
            $table->string('type');
            $table->boolean('is_special');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('system_id')->references('id')->in('systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
        Schema::dropIfExists('planets');
    }
};
