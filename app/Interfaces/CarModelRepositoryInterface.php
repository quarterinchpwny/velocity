<?php

namespace App\Interfaces;

interface CarModelRepositoryInterface
{
    public function allCarModels();
    public function createCarModel(array $data);
    public function updateCarModel(array $data, $code);
    public function deleteCarModel($code);
    public function showCarModel($code);
}
