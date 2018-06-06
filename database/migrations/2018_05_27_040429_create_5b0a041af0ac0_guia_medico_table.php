<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5b0a041af0ac0GuiaMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('guia_medico')) {
            Schema::create('guia_medico', function (Blueprint $table) {
                $table->integer('guia_id')->unsigned()->nullable();
                $table->foreign('guia_id', 'fk_p_164555_164547_medico_5b0a041af0bb3')->references('id')->on('guias')->onDelete('cascade');
                $table->integer('medico_id')->unsigned()->nullable();
                $table->foreign('medico_id', 'fk_p_164547_164555_guium__5b0a041af0c38')->references('id')->on('medicos')->onDelete('cascade');
                
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
        Schema::dropIfExists('guia_medico');
    }
}
