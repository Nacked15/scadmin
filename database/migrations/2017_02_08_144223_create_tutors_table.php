<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * En esta tabla ya no se especifica la direccion, a cambio se crea una tabla
         * de direcciones, en el cual se guarda el tutor_id. la del alumno tambien se guardara
         * en dicha tabla (con el id del alumno).
         */
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namet');
            $table->string('surname1');
            $table->string('surname2');
            $table->string('job');
            $table->string('cellphonet');
            $table->string('phone');
            $table->string('relationship');
            $table->string('phone_alt');
            $table->string('relationship_alt');
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
        Schema::drop('tutors');
    }
}
