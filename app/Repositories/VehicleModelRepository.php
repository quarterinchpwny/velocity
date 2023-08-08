<?php

namespace App\Repositories;

use App\Interfaces\VehicleModelRepositoryInterface;
use App\Models\VehicleModel;

class VehicleModelRepository implements VehicleModelRepositoryInterface
{
    public function allVehicleModels()
    {
        return VehicleModel::all();
    }
    public function createVehicleModel(array $data)
    {
        return VehicleModel::create($data);
    }
    public function updateVehicleModel(array $data, $id)
    {
        $vehicleModel = $this->showVehicleModel($id);
        $vehicleModel->update($data);
        return $vehicleModel;
    }
    public function deleteVehicleModel($id)
    {
        $vehicleModel = $this->showVehicleModel($id);
        $vehicleModel->delete();
        return $vehicleModel;
    }
    public function showVehicleModel($id)
    {
        return VehicleModel::findOrFail($id);
    }
}
