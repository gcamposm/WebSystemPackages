<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('is_admin')->after('name')->default(0);
            $table->string('imgurl')->after('password')->default('../img/no-avatar.jpg');
            $table->string('address')->after('name')->nullable()->default(null);
            $table->string('city')->after('name')->nullable()->default(null);
            $table->string('province')->after('name')->nullable()->default(null);
            $table->string('postalcode')->after('name')->nullable()->default(null);
            $table->string('phone')->after('name')->nullable()->default(null);
            $table->string('name_on_card')->after('name')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
            $table->dropColumn('imgurl');
        });
    }
}
