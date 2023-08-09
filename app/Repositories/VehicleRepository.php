<?php

namespace App\Repositories;

use App\Interfaces\VehicleRepositoryInterface;
use App\Models\Vehicle;

class VehicleRepository implements VehicleRepositoryInterface
{

    public function allVehicles()
    {
        return Vehicle::with(['category', 'model', 'manufacturer'])->get();
    }

    public function createVehicle(array $data)
    {
        return Vehicle::create($data);
    }

    public function updateVehicle(array $data, $id)
    {
        $vehicle = $this->showVehicle($id);
        $vehicle->update($data);
        return $vehicle;
    }

    public function deleteVehicle($id)
    {
        $vehicle = $this->showVehicle($id);
        $vehicle->delete();
        return $vehicle;
    }

    public function showVehicle($id)
    {
        return Vehicle::with(['category', 'model', 'manufacturer'])->findOrFail($id);
    }
}
