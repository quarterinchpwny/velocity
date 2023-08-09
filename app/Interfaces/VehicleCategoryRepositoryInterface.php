<?php

namespace App\Interfaces;

interface VehicleCategoryRepositoryInterface
{
    public function allVehicleCategories();
    public function createVehicleCategory(array $data);
    public function updateVehicleCategory(array $data, $id);
    public function deleteVehicleCategory($id);
    public function showVehicleCategory($id);
}
