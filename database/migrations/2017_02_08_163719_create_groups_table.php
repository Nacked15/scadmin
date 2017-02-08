<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Como relacionar alumnos con clases para ques e cree un historial,
         * sin tener errores al eliminar una clase. En donde se guardaran datos
         * como fecha de baja de alumno, si pertenece a la sep o no.
         */
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id');
            $table->integer('student_id');
            $table->date('date_begin');
            $table->integer('state');
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
        Schema::drop('groups');
    }
}
