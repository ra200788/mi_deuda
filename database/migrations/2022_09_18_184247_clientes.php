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

        Schema::create('clientes', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('telefono');
            $table->bigInteger('cargo_id')->unsigned();
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
        Schema::dropIfExists('clientes');
    }
};
