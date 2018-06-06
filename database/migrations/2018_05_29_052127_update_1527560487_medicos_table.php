<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527560487MedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicos', function (Blueprint $table) {
            if(Schema::hasColumn('medicos', 'fone')) {
                $table->dropColumn('fone');
            }
            if(Schema::hasColumn('medicos', 'cpf')) {
                $table->dropColumn('cpf');
            }
            
        });
Schema::table('medicos', function (Blueprint $table) {
            
if (!Schema::hasColumn('medicos', 'fone')) {
                $table->string('fone')->nullable();
                }
if (!Schema::hasColumn('medicos', 'cpf')) {
                $table->string('cpf')->nullable();
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
            $table->dropColumn('fone');
            $table->dropColumn('cpf');
            
        });
Schema::table('medicos', function (Blueprint $table) {
                        $table->integer('fone')->nullable();
                $table->integer('cpf')->nullable();
                
        });

    }
}
