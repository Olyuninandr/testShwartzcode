<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estations', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->integer('cityId');
            $table->string('streetName');
            $table->integer('buildingNumber');
            $table->time('openingTime');
            $table->time('closingTime');

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
        Schema::dropIfExists('estations');
    }
}
