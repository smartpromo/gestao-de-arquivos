<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527381731MedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicos', function (Blueprint $table) {
            if(Schema::hasColumn('medicos', 'cpf')) {
                $table->dropColumn('cpf');
            }
            
        });
Schema::table('medicos', function (Blueprint $table) {
            
if (!Schema::hasColumn('medicos', 'cpf')) {
                $table->integer('cpf')->nullable();
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
        Schema::table('medicos', function (Blueprint $table) {
            $table->dropColumn('cpf');
            
        });
Schema::table('medicos', function (Blueprint $table) {
                        $table->integer('cpf')->nullable();
                
        });

    }
}
