<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527384107GuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guias', function (Blueprint $table) {
            
if (!Schema::hasColumn('guias', 'horario_especial')) {
                $table->tinyInteger('horario_especial')->nullable()->default('0');
                }
if (!Schema::hasColumn('guias', 'local_address')) {
                $table->string('local_address')->nullable();
                $table->double('local_latitude')->nullable();
                $table->double('local_longitude')->nullable();
                }
if (!Schema::hasColumn('guias', 'via')) {
                $table->enum('via', array('Selecione o tipo de via', 'ÚNICA', 'MESMA', 'DIFERENTE'))->nullable();
                }
if (!Schema::hasColumn('guias', 'tipo_de_guia')) {
                $table->enum('tipo_de_guia', array('Selecione o tipo de guia', 'Consulta', 'SADT', 'Honorários'))->nullable();
                }
if (!Schema::hasColumn('guias', 'acomodacoes')) {
                $table->enum('acomodacoes', array('Selecione o tipo de acomodação', 'APARTAMENTO', 'ENFERMARIA'))->nullable();
                }
if (!Schema::hasColumn('guias', 'guia')) {
                $table->string('guia')->nullable();
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
            $table->dropColumn('horario_especial');
            $table->dropColumn('local_address');
            $table->dropColumn('local_latitude');
            $table->dropColumn('local_longitude');
            $table->dropColumn('via');
            $table->dropColumn('tipo_de_guia');
            $table->dropColumn('acomodacoes');
            $table->dropColumn('guia');
            
        });

    }
}
