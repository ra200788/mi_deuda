<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {

       Schema::create('deudas', function (Blueprint $table) {
           $table->engine="InnoDB";
           $table->bigIncrements('id');
           $table->float('adeudo');
           $table->float('abono')->nullable()->default(0);
           $table->dateTime('fecha_adeudo');
           $table->bigInteger('cliente_id')->unsigned();
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
       Schema::dropIfExists('deudas');
   }
};
