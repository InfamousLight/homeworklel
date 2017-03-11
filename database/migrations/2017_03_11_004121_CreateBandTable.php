<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Band', function (Blueprint $table) {
            $table->increments('id');
            $table->primary('id');
            $table->string('name');
            $table->string('website');
            $table->date('start_date');
            $table->boolean('still_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Band');
    }
}
