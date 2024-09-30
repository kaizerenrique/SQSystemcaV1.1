<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();// id de laboratorio
            $table->string('nombreLaboratorio',250);//laboratorio
            $table->string('nombreyapellido',200);// nombre y apellido del pasiente
            $table->string('cedula',12)->nullable();
            $table->string('codigo',8);//codigo del usuario
            $table->float('costo', 10, 2);            
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
        Schema::dropIfExists('actividads');
    }
};
