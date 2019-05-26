<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id')->nullable();
            $table->foreign('sell_id')
                  ->references('id')
                  ->on('sells')
                  ->onDelete('cascade');
            $table->integer('insurance_id')->nullable();
            $table->foreign('insurance_id')
                ->references('id')
                ->on('insurances');
            $table->float('monto_total')->nullable();
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
        Schema::dropIfExists('insurance_reservations');
    }
}
