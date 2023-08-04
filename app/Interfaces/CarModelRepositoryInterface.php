<?php

namespace App\Interfaces;

interface CarModelRepositoryInterface
{
    public function allCarModels();
    public function createCarModel(array $data);
    public function updateCarModel(array $data, $id);
    public function deleteCarModel($id);
    public function showCarModel($id);
}
