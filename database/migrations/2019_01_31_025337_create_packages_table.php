<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roundtrip_id')->nullable();
            $table->foreign('roundtrip_id')
                    ->references('id')
                    ->on('roundtrip_flights')
                    ->onDelete('cascade');
            $table->integer('hotel_room_id')->nullable();
            $table->foreign('hotel_room_id')
                    ->references('id')
                    ->on('hotel_rooms')
                    ->onDelete('cascade');
            $table->integer('vehicle_id')->nullable();
            $table->foreign('vehicle_id')
                    ->references('id')
                    ->on('vehicles')
                    ->onDelete('cascade');
            $table->integer('type');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('precio');
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
        Schema::dropIfExists('packages');
    }
}
