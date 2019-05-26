<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flight_id');
            $table->foreign('flight_id')
                    ->references('id')
                    ->on('flights')
                    ->onDelete('cascade');
            $table->datetime('fecha');
            $table->string('tipo');
            $table->double('precio');
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
        Schema::dropIfExists('flight_reservations');
    }
}
