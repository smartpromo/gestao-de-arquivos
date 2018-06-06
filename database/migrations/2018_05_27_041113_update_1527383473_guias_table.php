<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527383473GuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guias', function (Blueprint $table) {
            if(Schema::hasColumn('guias', 'convenio')) {
                $table->dropColumn('convenio');
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
                        $table->enum('convenio', array('Unimed', 'Bradesco', 'Sulamerica', 'Petrobras', 'Cassi'))->nullable();
                
        });

    }
}
