<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleReservationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_reservation_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_reservation_id');
            $table->foreign('vehicle_reservation_id')
                ->references('id')
                ->on('vehicle_reservations');
            $table->integer('vehicle_id');
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade');
            $table->datetime('fecha_retiro');
            $table->datetime('fecha_regreso');
            $table->float('precio_reserva');
            $table->float('descuento');
            $table->integer('cantidad');
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
        Schema::dropIfExists('vehicle_reservation_details');
    }
}
