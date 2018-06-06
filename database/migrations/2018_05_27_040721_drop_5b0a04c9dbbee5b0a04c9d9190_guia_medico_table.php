<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5b0a04c9dbbee5b0a04c9d9190GuiaMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('guia_medico');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('guia_medico')) {
            Schema::create('guia_medico', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('guia_id')->unsigned()->nullable();
            $table->foreign('guia_id', 'fk_p_164555_164547_medico_5b0a041aefb28')->references('id')->on('guias');
                $table->integer('medico_id')->unsigned()->nullable();
            $table->foreign('medico_id', 'fk_p_164547_164555_guium__5b0a041aef352')->references('id')->on('medicos');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
