<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id')->nullable();
            $table->foreign('sell_id')
                ->references('id')
                ->on('sells')
                ->onDelete('cascade');
            $table->integer('hotel_room_id')->nullable();
            $table->foreign('hotel_room_id')
                ->references('id')
                ->on('hotel_rooms')
                ->onDelete('cascade');
            $table->float('precio');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso');
            $table->integer('cantidad');
            $table->float('monto_total');
            $table->float('descuento');
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
        Schema::dropIfExists('hotel_reservations');
    }
}
