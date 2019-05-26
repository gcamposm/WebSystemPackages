<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousingAndServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('housing_and_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('housing_service_id');
            $table->foreign('housing_service_id')
                ->references('id')
                ->on('housing_services')
                ->onDelete('cascade');
            $table->integer('private_housing_id');
            $table->foreign('private_housing_id')
                ->references('id')
                ->on('private_housings')
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
        Schema::dropIfExists('housing_and_services');
    }
}
