<?php

namespace App\Http\Controllers;

use App\Models\VehicleCategory;
use App\Http\Requests\StoreVehicleCategoryRequest;
use App\Http\Requests\UpdateVehicleCategoryRequest;

class VehicleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleCategory $vehicleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleCategory $vehicleCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleCategoryRequest  $request
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleCategoryRequest $request, VehicleCategory $vehicleCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleCategory $vehicleCategory)
    {
        //
    }
}
