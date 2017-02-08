<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Crear una tabla para relacionar los alumnos con sus clases
         * para llevar un historia de las clases de ingles que han tomado.
         */
        Schema::create('academic_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ocupation');
            $table->string('workplace');
            $table->string('studies');
            $table->string('last_grade');
            $table->string('previus_course');
            $table->integer('student_id');
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
        Schema::drop('academic_info');
    }
}
