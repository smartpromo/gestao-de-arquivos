<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527383064GuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guias', function (Blueprint $table) {
            
if (!Schema::hasColumn('guias', 'convenio')) {
                $table->enum('convenio', array('Unimed', 'Bradesco', 'Sulamerica', 'Petrobras', 'Cassi'))->nullable();
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
            $table->dropColumn('convenio');
            
        });

    }
}
