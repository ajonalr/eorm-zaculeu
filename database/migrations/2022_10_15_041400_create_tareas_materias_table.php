<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_final_tarea', function (Blueprint $table) {
            $table->id();


            $table->bigInteger('grado_id')->unsigned();
            $table->foreign('grado_id')->references('id')->on('grado');

            $table->bigInteger('materia_id')->unsigned();
            $table->foreign('materia_id')->references('id')->on('materia_grados');

            $table->string('nombre');
            $table->double('valor')->default(0);
            $table->string('bloque')->nullable();
            $table->date('entrega')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('tareas_materias');
    }
}
