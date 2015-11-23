<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTableRemoveNameAddFirstNameLastNameUuid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->dropColumn('name');
            $table->string('uuid', 36)->after('id');
            $table->string('first_name', 50)->after('uuid');
            $table->string('last_name', 50)->after('first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');
            $table->dropColumn('uuid');
            $table->string('name')->after('id');
        });
    }
}
