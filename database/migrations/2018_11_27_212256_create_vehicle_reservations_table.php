<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id')->nullable();
            $table->foreign('sell_id')
                  ->references('id')
                  ->on('sells')
                  ->onDelete('cascade');
            $table->integer('vehicle_id');
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade');
            $table->float('monto_total')->nullable();
            $table->date('fecha_retiro')->nullable();
            $table->date('fecha_regreso')->nullable();
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
        Schema::dropIfExists('vehicle_reservations');
    }
}
