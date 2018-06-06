<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b0b0f57ebab2RelationshipsToRelatorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios', function(Blueprint $table) {
            if (!Schema::hasColumn('relatorios', 'medico_id')) {
                $table->integer('medico_id')->unsigned()->nullable();
                $table->foreign('medico_id', '164567_5b0a0f2e3e6ef')->references('id')->on('medicos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('relatorios', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '164567_5b0a0f2e546c2')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('relatorios', function(Blueprint $table) {
            
        });
    }
}
