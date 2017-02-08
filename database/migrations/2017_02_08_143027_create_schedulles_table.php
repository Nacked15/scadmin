<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedullesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedulles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year');
            $table->date('date_init');
            $table->date('date_end');
            $table->time('hour_init');
            $table->time('hour_end');
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
        Schema::drop('schedulles');
    }
}
