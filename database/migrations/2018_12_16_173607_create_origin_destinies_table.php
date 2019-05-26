<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOriginDestiniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origin_destinies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flight_detail_id');
            $table->foreign('flight_detail_id')
                ->references('id')
                ->on('flight_details')
                ->onDelete('cascade');
            $table->integer('airport_id');
            $table->foreign('airport_id')
                ->references('id')
                ->on('airports')
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
        Schema::dropIfExists('origin_destinies');
    }
}
