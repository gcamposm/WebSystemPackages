<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateHousingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_housings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('housing_calendary_id');
            $table->foreign('housing_calendary_id')
                ->references('id')
                ->on('housing_calendaries')
                ->onDelete('cascade');
            $table->integer('capacidad');
            $table->string('direccion');
            $table->string('nombre');
            $table->float('estrella');
            $table->float('valoracion');
            $table->string('pais');
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
        Schema::dropIfExists('private_housings');
    }
}
