<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * No se agregan los campos ncontrol (irrelevante por ahora),
         * address y reference (se guardan en la tabla addres)
         * comment y homestay (Guardarlo en tabla info_extra)
         */
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tutor_id');
            $table->string('name');
            $table->string('surname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('genre');
            $table->string('civil_status');
            $table->string('cellphone');
            $table->string('sickness');
            $table->string('medication');
            $table->integer('status');
            $table->string('avatar');

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
        Schema::drop('students');
    }
}
