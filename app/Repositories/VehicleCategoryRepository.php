<?php

namespace App\Repositories;

use App\Interfaces\VehicleCategoryRepositoryInterface;
use App\Models\VehicleCategory;

class VehicleCategoryRepository implements VehicleCategoryRepositoryInterface
{
    public function allVehicleCategories()
    {
        return VehicleCategory::all();
    }
    public function createVehicleCategory(array $data)
    {
        return VehicleCategory::create($data);
    }
    public function updateVehicleCategory(array $data, $code)
    {
        $vehicleCategory = $this->showVehicleCategory($code);
        $vehicleCategory->update($data);
        return $vehicleCategory;
    }
    public function deleteVehicleCategory($code)
    {
        $vehicleCategory = $this->showVehicleCategory($code);
        $vehicleCategory->delete();
        return $vehicleCategory;
    }
    public function showVehicleCategory($code)
    {
        return VehicleCategory::findOrFail($code);
    }
}
