<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tramo1_id')->nullable();;
            $table->foreign('tramo1_id')
                ->references('id')
                ->on('flight_details')
                ->onDelete('cascade');
            $table->integer('tramo2_id')->nullable();;
            $table->foreign('tramo2_id')
                ->references('id')
                ->on('flight_details')
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
            $table->integer('escalas');
            $table->integer('precio_economy');
            $table->integer('precio_bussiness');
            $table->integer('precio_premium');
            $table->datetime('fecha_despegue');
            $table->datetime('fecha_aterrizaje');
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
        Schema::dropIfExists('flights');
    }
}
