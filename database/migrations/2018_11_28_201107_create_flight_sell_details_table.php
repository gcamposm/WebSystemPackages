<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightSellDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_sell_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id')->unsigned()->nullable();
            $table->foreign('sell_id')
                ->references('id')
                ->on('sells')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->integer('flight_id')->unsigned()->nullable();
            $table->foreign('flight_id')
                    ->references('id')
                    ->on('flights')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            $table->integer('roundtrip_id')->unsigned()->nullable();
            $table->foreign('roundtrip_id')
                ->references('id')
                ->on('roundtrip_flights')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->integer('cantidad')->unsigned();
            $table->string('precio');
            $table->string('descuento');
            $table->string('monto_total');
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
        Schema::dropIfExists('flight_sell_details');
    }
}
