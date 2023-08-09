<?php

namespace App\Interfaces;

interface VehicleRepositoryInterface
{
    public function allVehicles();
    public function createVehicle(array $data);
    public function updateVehicle(array $data, $id);
    public function deleteVehicle($id);
    public function showVehicle($id);
}
