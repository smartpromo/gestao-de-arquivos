<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527560216RelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios', function (Blueprint $table) {
            
if (!Schema::hasColumn('relatorios', 'valor_total')) {
                $table->decimal('valor_total', 15, 2)->nullable();
                }
if (!Schema::hasColumn('relatorios', 'valor_da_glosas')) {
                $table->string('valor_da_glosas')->nullable();
                }
if (!Schema::hasColumn('relatorios', 'valor_liquido')) {
                $table->decimal('valor_liquido', 15, 2)->nullable();
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
            $table->dropColumn('valor_total');
            $table->dropColumn('valor_da_glosas');
            $table->dropColumn('valor_liquido');
            
        });

    }
}
