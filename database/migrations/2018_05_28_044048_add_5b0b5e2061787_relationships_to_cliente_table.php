<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b0b5e2061787RelationshipsToClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function(Blueprint $table) {
            if (!Schema::hasColumn('clientes', 'medico_id')) {
                $table->integer('medico_id')->unsigned()->nullable();
                $table->foreign('medico_id', '164566_5b0a0ce0e9e3d')->references('id')->on('medicos')->onDelete('cascade');
                }
                if (!Schema::hasColumn('clientes', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '164566_5b0a0ce1126a3')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('clientes', function(Blueprint $table) {
            
        });
    }
}
