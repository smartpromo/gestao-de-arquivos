<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b0a04ccedaffRelationshipsToGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guias', function(Blueprint $table) {
            if (!Schema::hasColumn('guias', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '164555_5b0a02f260d0f')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('guias', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '164555_5b0a02f26be72')->references('id')->on('teams')->onDelete('cascade');
                }
                if (!Schema::hasColumn('guias', 'medico_id')) {
                $table->integer('medico_id')->unsigned()->nullable();
                $table->foreign('medico_id', '164555_5b0a04ca1f14c')->references('id')->on('medicos')->onDelete('cascade');
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
        Schema::table('guias', function(Blueprint $table) {
            
        });
    }
}
