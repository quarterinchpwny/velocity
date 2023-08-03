<?php

namespace App\Repositories;

use App\Interfaces\CarModelRepositoryInterface;
use App\Models\CarModel;

class CarModelRepository implements CarModelRepositoryInterface
{
    public function allCarModels()
    {
        return CarModel::all();
    }
    public function createCarModel(array $data)
    {
        return CarModel::create($data);
    }
    public function updateCarModel(array $data, $id)
    {
        $carModel = $this->showCarModel($id);
        $carModel->update($data);
        return $carModel;
    }
    public function deleteCarModel($id)
    {
        $carModel = $this->showCarModel($id);
        $carModel->delete();
        return $carModel;
    }
    public function showCarModel($id)
    {
        return CarModel::findOrFail($id);
    }
}
