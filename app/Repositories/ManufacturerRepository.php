<?php

namespace App\Repositories;

use App\Interfaces\ManufacturerRepositoryInterface;
use App\Models\Manufacturer;

class ManufacturerRepository implements ManufacturerRepositoryInterface
{

    public function allManufacturers()
    {
        return Manufacturer::all();
    }

    public function createManufacturer(array $data)
    {
        return Manufacturer::create($data);
    }

    public function updateManufacturer(array $data, $code)
    {
        $manufacturer = $this->showManufacturer($code);
        $manufacturer->update($data);
        return $manufacturer;
    }

    public function deleteManufacturer($code)
    {
        $manufacturer = $this->showManufacturer($code);
        $manufacturer->delete();
        return $manufacturer;
    }

    public function showManufacturer($code)
    {
        return Manufacturer::findOrFail($code);
    }
}
