<?php

namespace App\Interfaces;

interface ManufacturerRepositoryInterface
{
    public function allManufacturers();
    public function createManufacturer(array $data);
    public function updateManufacturer(array $data, $code);
    public function deleteManufacturer($code);
    public function showManufacturer($code);
}
