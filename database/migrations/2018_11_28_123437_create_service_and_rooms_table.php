<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceAndRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_and_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('housing_service_id');
            $table->foreign('housing_service_id')
                ->references('id')
                ->on('housing_services')
                ->onDelete('cascade');
            $table->integer('hotel_room_id');
            $table->foreign('hotel_room_id')
                ->references('id')
                ->on('hotel_rooms')
                ->onDelete('cascade');
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
        Schema::dropIfExists('service_and_rooms');
    }
}
