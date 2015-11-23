<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_widget', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('widget_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('widget_id')->references('id')->on('widgets');

            $table->index('user_id');
            $table->index('widget_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_widget');
    }
}
