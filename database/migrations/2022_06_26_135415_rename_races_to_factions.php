<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private function removeForeign($table, $column)
    {
        $table->dropForeign($column);
        $table->dropColumn($column);
    }

    private function createForeign($table, $column, $nullable = false)
    {
        $table->unsignedBigInteger($column)->after('id')->nullable($nullable);
        $table->foreign($column)->references('id')->on('factions');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::table('lores', fn(Blueprint $table) => $this->removeForeign($table, 'race_id'));
        Schema::table('systems', fn(Blueprint $table) => $this->removeForeign($table, 'race_id'));
        Schema::table('technologies', fn(Blueprint $table) => $this->removeForeign($table, 'race_id'));
        Schema::table('units', fn(Blueprint $table) => $this->removeForeign($table, 'race_id'));

        Schema::rename('races', 'factions');

        Schema::table('lores', fn(Blueprint $table) => $this->createForeign($table, 'faction_id'));
        Schema::table('systems', fn(Blueprint $table) => $this->createForeign($table, 'faction_id', true));
        Schema::table('technologies', fn(Blueprint $table) => $this->createForeign($table, 'faction_id', true));
        Schema::table('units', fn(Blueprint $table) => $this->createForeign($table, 'faction_id', true));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lores', fn(Blueprint $table) => $this->removeForeign($table, 'faction_id'));
        Schema::table('systems', fn(Blueprint $table) => $this->removeForeign($table, 'faction_id'));
        Schema::table('technologies', fn(Blueprint $table) => $this->removeForeign($table, 'faction_id'));
        Schema::table('units', fn(Blueprint $table) => $this->removeForeign($table, 'faction_id'));

        Schema::rename('factions', 'races');

        Schema::table('lores', fn(Blueprint $table) => $this->createForeign($table, 'race_id'));
        Schema::table('systems', fn(Blueprint $table) => $this->createForeign($table, 'race_id', true));
        Schema::table('technologies', fn(Blueprint $table) => $this->createForeign($table, 'race_id', true));
        Schema::table('units', fn(Blueprint $table) => $this->createForeign($table, 'race_id', true));
    }
};
