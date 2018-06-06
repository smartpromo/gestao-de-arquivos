<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b0a0b86cb088RelationshipsToPeriodoDoRelatorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodo_do_relatorios', function(Blueprint $table) {
            if (!Schema::hasColumn('periodo_do_relatorios', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '164565_5b0a0b83cced4')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('periodo_do_relatorios', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '164565_5b0a0b83d8c6d')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('periodo_do_relatorios', function(Blueprint $table) {
            
        });
    }
}
