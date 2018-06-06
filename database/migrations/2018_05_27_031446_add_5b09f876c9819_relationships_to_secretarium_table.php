<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5b09f876c9819RelationshipsToSecretariumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('secretarias', function(Blueprint $table) {
            if (!Schema::hasColumn('secretarias', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '164548_5b09f748ae516')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('secretarias', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '164548_5b09f748ba1f9')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('secretarias', function(Blueprint $table) {
            
        });
    }
}
