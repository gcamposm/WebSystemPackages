<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceAndProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_and_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_service_id');
            $table->foreign('vehicle_service_id')
                ->references('id')
                ->on('vehicle_services')
                ->onDelete('cascade');
            $table->integer('vehicle_provider_id');
            $table->foreign('vehicle_provider_id')
                ->references('id')
                ->on('vehicle_providers')
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
        Schema::dropIfExists('service_and_providers');
    }
}
