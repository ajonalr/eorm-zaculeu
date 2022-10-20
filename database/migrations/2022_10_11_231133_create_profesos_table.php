<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('puesto')->nullable();
            $table->json('cursos')->nullable();
            $table->string('cui')->nullable();
            $table->string('email')->nullable();
            $table->string('contrasena')->nullable();
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
        Schema::dropIfExists('profesos');
    }
}
