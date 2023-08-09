<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Interfaces\VehicleCategoryRepositoryInterface;

use App\Models\VehicleCategory;
use App\Http\Requests\StoreVehicleCategoryRequest;
use App\Http\Requests\UpdateVehicleCategoryRequest;
use Whoops\Run;

class VehicleCategoryController extends Controller
{
    private VehicleCategoryRepositoryInterface $vehicleCategoryRepository;

    public function __construct(VehicleCategoryRepositoryInterface $vehicleCategoryRepository)
    {
        $this->vehicleCategoryRepository = $vehicleCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->successResponse($this->vehicleCategoryRepository->allVehicleCategories(), 'All Vehicle Categories', Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleCategoryRequest $request)
    {
        $payload = $request->all();
        $id = $request->route('vehicle_category');
        return $this->successResponse($this->vehicleCategoryRepository->createVehicleCategory($payload, $id), 'Vehicle Category Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route('vehicle_category');
        return $this->successResponse($this->vehicleCategoryRepository->showVehicleCategory($id), 'Vehicle Category Details', Response::HTTP_OK);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleCategoryRequest  $request
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleCategoryRequest $request)
    {
        $payload = $request->all();
        $id = $request->route('vehicle_category');
        return $this->successResponse($this->vehicleCategoryRepository->updateVehicleCategory($payload, $id), 'Vehicle Category Updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateVehicleCategoryRequest $request)
    {
        $id = $request->route('vehicle_category');
        return $this->successResponse($this->vehicleCategoryRepository->deleteVehicleCategory($id), 'Vehicle Category Deleted', Response::HTTP_OK);
    }
}
