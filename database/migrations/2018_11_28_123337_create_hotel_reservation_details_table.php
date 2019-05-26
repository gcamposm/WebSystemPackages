<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelReservationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_reservation_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_reservation_id')->nullable();
            $table->foreign('hotel_reservation_id')
                ->references('id')
                ->on('hotel_reservations')
                ->onDelete('cascade');
            $table->integer('hotel_room_id')->nullable();
            $table->foreign('hotel_room_id')
                ->references('id')
                ->on('hotel_rooms')
                ->onDelete('cascade');
            // $table->integer('private_housing_id')->nullable();
            // $table->foreign('private_housing_id')
            //     ->references('id')
            //     ->on('private_housings')
            //     ->onDelete('cascade');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso');
            $table->float('precio');
            $table->string('tipo');
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
        Schema::dropIfExists('hotel_reservation_details');
    }
}
