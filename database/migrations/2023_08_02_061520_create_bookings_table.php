<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->char('status_code');
            $table->foreign('status_code')->references('code')->on('booking_statuses');
            $table->char('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->char('vehicle_code');
            $table->foreign('vehicle_code')->references('code')->on('vehicles');
            $table->date('start_date');
            $table->date('end_date');
            $table->char('confirmation_status');
            $table->char('payment_status');
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
        Schema::dropIfExists('bookings');
    }
}
