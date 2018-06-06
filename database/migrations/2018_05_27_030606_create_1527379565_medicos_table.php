<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1527379565MedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('medicos')) {
            Schema::create('medicos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nome')->nullable();
                $table->integer('crm')->nullable();
                $table->integer('fone')->nullable();
                $table->string('especialidade')->nullable();
                $table->string('email')->nullable();
                $table->string('uf_do_crm')->nullable();
                $table->integer('cpf')->nullable();
                $table->integer('rg')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('medicos');
    }
}
