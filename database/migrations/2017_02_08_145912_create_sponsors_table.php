<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * La relacion entre padrinos y alumnos se establece en la tabla
         * becas (scholarship).
         *
         * De esta forma se puede controlar cuando un padrino esta activo o no,
         * y llevar un historial de las veces en que ha sido padrino, en que ciclo escolar
         * y a que alumno beneficio.
         *
         * Recordar que sera necesario la gestion de cambio de beneficiario a mitad del ciclo escolar.
         * esto se hara, craando un nuevo registro unicamente en scholarship, para de esta forma guardar 
         * a todos los alumnos que a becado tal o cual padrino.
         */
        Schema::create('sponsors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namesp');
            $table->string('surnamesp');
            $table->string('phone');
            $table->string('email');
            $table->string('description');
            $table->string('type');
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
        Schema::drop('sponsors');
    }
}
