<?php

namespace App\Interfaces;

interface VehicleCategoryRepositoryInterface
{
    public function allVehicleCategories();
    public function createVehicleCategory(array $data);
    public function updateVehicleCategory(array $data, $code);
    public function deleteVehicleCategory($code);
    public function showVehicleCategory($code);
}
