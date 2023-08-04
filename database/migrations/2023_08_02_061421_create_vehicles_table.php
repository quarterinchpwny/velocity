<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->char('code')->unique();
            $table->char('vehicle_model');
            $table->char('vehicle_name');
            $table->char('vehicle_details');
            $table->char('manufacturer_code');
            $table->foreign('manufacturer_code')->references('code')->on('manufacturers');
            $table->char('category_code');
            $table->foreign('category_code')->references('code')->on('vehicle_categories');
            $table->char('model_code');
            $table->foreign('model_code')->references('code')->on('car_models');
            $table->integer('daily_hire_rate');
            $table->integer('mileage');
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
        Schema::dropIfExists('vehicles');
    }
}
