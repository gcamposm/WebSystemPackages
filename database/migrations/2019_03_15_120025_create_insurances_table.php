<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flight_id')->nullable();
            $table->foreign('flight_id')
                    ->references('id')
                    ->on('flights')
                    ->onDelete('cascade');
            $table->integer('zone_id');
            $table->foreign('zone_id')
                ->references('id')
                ->on('zones')
                ->onDelete('cascade');
            $table->string('medicalService');
            $table->string('service2');
            $table->string('service3');
            $table->string('active');
            $table->string('groupsize');
            $table->integer('avgage');
            $table->integer('price');
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
        Schema::dropIfExists('insurances');
    }
}
