<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1528250052RelatoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios', function (Blueprint $table) {
            if(Schema::hasColumn('relatorios', 'relatorios_convenios_id')) {
                $table->dropForeign('164567_5b161174c6937');
                $table->dropIndex('164567_5b161174c6937');
                $table->dropColumn('relatorios_convenios_id');
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
                        
        });

    }
}
