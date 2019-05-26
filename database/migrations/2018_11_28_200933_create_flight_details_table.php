<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airport_id');
            $table->foreign('airport_id')
                ->references('id')
                ->on('airports')
                ->onDelete('cascade');
            $table->integer('origin_id');
            $table->foreign('origin_id')
                ->references('id')
                ->on('airports')
                ->onDelete('cascade');
            $table->integer('destiny_id');
            $table->foreign('destiny_id')
                ->references('id')
                ->on('airports')
                ->onDelete('cascade');
            $table->integer('precio_economy');
            $table->integer('precio_premium');
            $table->integer('precio_bussiness');
            $table->datetime('fecha_despegue');
            $table->datetime('fecha_aterrizaje');
            $table->integer('asientos_economy');
            $table->integer('asientos_bussiness');
            $table->integer('asientos_premium');
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
        Schema::dropIfExists('flight_details');
    }
}
