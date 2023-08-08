<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Interfaces\VehicleRepositoryInterface;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    private VehicleRepositoryInterface $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->vehicleRepository->allVehicles(), 'All Vehicles', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        try {
            $payload = $request->all();
            $id = $request->route('vehicle');
            return $this->successResponse($this->vehicleRepository->createVehicle($payload, $id), 'Vehicle Created', Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Vehicle not created ', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            $id = $request->route('vehicle');

            return $this->successResponse($this->vehicleRepository->showVehicle($id), 'Vehicle Details', Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Vehicle not found', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request)
    {
        try {
            $payload = $request->all();
            $id = $request->route('vehicle');
            return $this->successResponse($this->vehicleRepository->updateVehicle($payload, $id), 'Vehicle Updated', Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Vehicle not updated', Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $id = $request->route('vehicle');
            return $this->successResponse($this->vehicleRepository->deleteVehicle($id), 'Vehicle Deleted', Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse(null, 'Vehicle not deleted', Response::HTTP_NOT_FOUND);
        }
    }
}
