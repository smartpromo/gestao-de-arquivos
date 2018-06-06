<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1527379780SecretariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('secretarias')) {
            Schema::create('secretarias', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nome')->nullable();
                $table->string('email')->nullable();
                $table->integer('telkefone_celular')->nullable();
                $table->integer('telefone_fixo')->nullable();
                
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
        Schema::dropIfExists('secretarias');
    }
}
