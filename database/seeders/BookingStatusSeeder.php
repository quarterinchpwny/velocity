<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookingStatus;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookingStatus::factory(10)->create();
    }
}
