<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patente')->unique();
            $table->integer('vehicle_calendary_id');
            $table->foreign('vehicle_calendary_id')
                ->references('id')
                ->on('vehicle_calendaries')
                ->onDelete('cascade');
            $table->integer('vehicle_provider_id');
            $table->foreign('vehicle_provider_id')
                ->references('id')
                ->on('vehicle_providers')
                ->onDelete('cascade');
            $table->integer('zone_id');
            $table->foreign('zone_id')
                ->references('id')
                ->on('zones')
                ->onDelete('cascade');
            $table->string('marca');
            $table->string('tipo');
            $table->string('gamma');
            $table->string('transmision');
            $table->string('combustible');
            $table->integer('n_pasajeros');
            $table->integer('equipaje_g');
            $table->integer('equipaje_p');
            $table->integer('n_puertas');
            $table->integer('n_kilometraje');
            $table->float('precio');
            $table->string('aire_acondicionado');
            $table->integer('ciudad_id');
            $table->foreign('ciudad_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
        	$table->string('pais');
    		$table->string('ciudad');
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
        Schema::dropIfExists('vehicles');
    }
}
