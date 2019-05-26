<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sell_id')->nullable();
            $table->foreign('sell_id')
                  ->references('id')
                  ->on('sells')
                  ->onDelete('cascade');
            $table->integer('package_id')->nullable();
            $table->foreign('package_id')
                ->references('id')
                ->on('packages');
            $table->string('monto_total')->nullable();
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
        Schema::dropIfExists('package_reservations');
    }
}
