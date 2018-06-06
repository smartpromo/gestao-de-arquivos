<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1528249997GuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guias', function (Blueprint $table) {
            if(Schema::hasColumn('guias', 'relatorios_id')) {
                $table->dropForeign('164555_5b160d2033563');
                $table->dropIndex('164555_5b160d2033563');
                $table->dropColumn('relatorios_id');
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
                        
        });

    }
}
