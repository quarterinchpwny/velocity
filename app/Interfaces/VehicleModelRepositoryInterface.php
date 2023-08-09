<?php

namespace App\Interfaces;

interface VehicleModelRepositoryInterface
{
    public function allVehicleModels();
    public function createVehicleModel(array $data);
    public function updateVehicleModel(array $data, $id);
    public function deleteVehicleModel($id);
    public function showVehicleModel($id);
}
