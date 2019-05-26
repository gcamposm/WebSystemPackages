<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceAndVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_and_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_service_id');
            $table->foreign('vehicle_service_id')
                ->references('id')
                ->on('vehicle_services')
                ->onDelete('cascade');
            $table->string('patente');
            $table->foreign('patente')
                ->references('patente')
                ->on('vehicles')
                ->onDelete('cascade');
            $table->float('precio');
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
        Schema::dropIfExists('service_and_vehicles');
    }
}
