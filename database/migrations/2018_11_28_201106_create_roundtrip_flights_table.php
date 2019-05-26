<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundtripFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roundtrip_flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vuelo_ida_id')->nullable();;
            $table->foreign('vuelo_ida_id')
                ->references('id')
                ->on('flights')
                ->onDelete('cascade');
            $table->integer('vuelo_vuelta_id')->nullable();;
            $table->foreign('vuelo_vuelta_id')
                ->references('id')
                ->on('flights')
                ->onDelete('cascade');
            $table->integer('precio_economy');
            $table->integer('precio_premium');
            $table->integer('precio_bussiness');
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
        Schema::dropIfExists('roundtrip_flights');
    }
}
