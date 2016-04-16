<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('do_id');
            $table->integer('game');
            $table->string('name');
            $table->string('ip', 90);
            $table->integer('status');
            $table->integer('snapshot');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('servers');
    }
}
