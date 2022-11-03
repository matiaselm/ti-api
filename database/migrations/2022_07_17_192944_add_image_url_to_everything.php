<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private $table_names = [
        'factions',
        'technology_types',
        'technologies',
        'systems',
        'planets',
        'anomalies',
        'lores',
        'units'
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach($this->table_names as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->string('image_url', 2083)->after('id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach($this->table_names as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->dropColumn('image_url');
            });
        }
    }
};
