<?php

namespace App\Interfaces;

interface ManufacturerRepositoryInterface
{
    public function allManufacturers();
    public function createManufacturer(array $data);
    public function updateManufacturer(array $data, $id);
    public function deleteManufacturer($id);
    public function showManufacturer($id);
}
