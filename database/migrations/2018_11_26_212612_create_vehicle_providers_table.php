<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('politica_combustible');
            $table->string('documentacion_necesaria');
            $table->string('franquicia_daños');
            $table->float('calificacion');
            $table->float('deposito_seguridad');
            $table->integer('kilometraje');
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
        Schema::dropIfExists('vehicle_providers');
    }
}
