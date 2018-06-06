<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527383707GuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guias', function (Blueprint $table) {
            
if (!Schema::hasColumn('guias', 'horario_inicial')) {
                $table->time('horario_inicial')->nullable();
                }
if (!Schema::hasColumn('guias', 'horario_final')) {
                $table->time('horario_final')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guias', function (Blueprint $table) {
            $table->dropColumn('horario_inicial');
            $table->dropColumn('horario_final');
            
        });

    }
}
