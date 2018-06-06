<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b16117860bd5RelationshipsToRelatorioTable extends Migration
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
                if (!Schema::hasColumn('relatorios', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '164567_5b0a0f2e49647')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('relatorios', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '164567_5b0a0f2e546c2')->references('id')->on('teams')->onDelete('cascade');
                }
                if (!Schema::hasColumn('relatorios', 'relatorios_convenios_id')) {
                $table->integer('relatorios_convenios_id')->unsigned()->nullable();
                $table->foreign('relatorios_convenios_id', '164567_5b161174c6937')->references('id')->on('medicos')->onDelete('cascade');
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
