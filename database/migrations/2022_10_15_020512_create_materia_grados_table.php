<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_grados', function (Blueprint $table) {
            $table->id();


            $table->bigInteger('grado_id')->unsigned();
            $table->foreign('grado_id')->references('id')->on('grado');


            $table->bigInteger('profesor_id')->unsigned();
            $table->foreign('profesor_id')->references('id')->on('profesos');

            $table->string('nombre', 50);

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
        Schema::dropIfExists('materia_grados');
    }
}
