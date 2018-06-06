<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1527471670SecretariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('secretarias', function (Blueprint $table) {
            if(Schema::hasColumn('secretarias', 'created_by_id')) {
                $table->dropForeign('164548_5b09f748ae516');
                $table->dropIndex('164548_5b09f748ae516');
                $table->dropColumn('created_by_id');
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
        Schema::table('secretarias', function (Blueprint $table) {
                        
        });

    }
}
