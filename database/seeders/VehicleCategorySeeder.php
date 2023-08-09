<?php

namespace Database\Seeders;


use App\Models\VehicleCategory;
use Illuminate\Database\Seeder;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleCategory::factory(10)->create();
    }
}
