<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527381998MedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicos', function (Blueprint $table) {
            if(Schema::hasColumn('medicos', 'created_by_id')) {
                $table->dropForeign('164547_5b09f67210aeb');
                $table->dropIndex('164547_5b09f67210aeb');
                $table->dropColumn('created_by_id');
            }
            if(Schema::hasColumn('medicos', 'created_by_team_id')) {
                $table->dropForeign('164547_5b09f6721cc68');
                $table->dropIndex('164547_5b09f6721cc68');
                $table->dropColumn('created_by_team_id');
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
                        
        });

    }
}
