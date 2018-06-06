<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1528249920RelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios', function (Blueprint $table) {
            if(Schema::hasColumn('relatorios', 'valor_da_glosas')) {
                $table->dropColumn('valor_da_glosas');
            }
            if(Schema::hasColumn('relatorios', 'valor_liquido')) {
                $table->dropColumn('valor_liquido');
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
        Schema::table('relatorios', function (Blueprint $table) {
                        $table->string('valor_da_glosas')->nullable();
                $table->decimal('valor_liquido', 15, 2)->nullable();
                
        });

    }
}
