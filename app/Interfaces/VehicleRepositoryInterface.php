<?php

namespace App\Interfaces;

interface VehicleRepositoryInterface
{
    public function allVehicles();
    public function createVehicle(array $data);
    public function updateVehicle(array $data, $code);
    public function deleteVehicle($code);
    public function showVehicle($code);
}
