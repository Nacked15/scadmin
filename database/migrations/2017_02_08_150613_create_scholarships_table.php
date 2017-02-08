<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Tabla intermediaria entre padrinos y alumnos.
         * tendra una relacion de muchos a muchos, es decir, un padrino
         * puede tener a varios becarios y un becario puede contar con varios 
         * padrinos.
         *
         * El status, servira para ver si esa beca esta activa en el ciclo escolar
         * en curso.
         *
         * Falta ver donde se guarda la info de los alumnos que se postulan para becas,
         * en esta tabla?? o en la de alumnos.
         */
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sponsor_id');
            $table->integer('student_id');
            $table->integer('date_created');
            $table->string('ciclo');
            $table->string('status');
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
        Schema::drop('scholarships');
    }
}
