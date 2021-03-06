<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacantes');
            $table->text('descripcion');

            $table->integer('horario_id')->unsigned();
            $table->integer('especialidad_id')->unsigned();
            $table->integer('tutor_id')->unsigned();
            $table->integer('sede_id')->unsigned();
            $table->integer('tipo_oferta_id')->unsigned();
            
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
            $table->foreign('especialidad_id')->references('especialidad_id')->on('horarios')->onDelete('cascade');
            $table->foreign('tutor_id')->references('tutor_id')->on('horarios')->onDelete('cascade');
            $table->foreign('sede_id')->references('id')->on('sedes')->onDelete('cascade');
            $table->foreign('tipo_oferta_id')->references('id')->on('tipo_ofertas')->onDelete('cascade');

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
        Schema::drop('ofertas');
    }
}
