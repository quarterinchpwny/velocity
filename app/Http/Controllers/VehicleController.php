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
        return $this->sucessResponse($this->vehicleRepository->allVehicles(), 'All Vehicles', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $payload = $request->all();
        $id = $request->route('vehicle');
        return $this->successResponse($this->vehicleRepository->createVehicle($payload, $id), 'Vehicle Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route('vehicle');
        return $this->successResponse($this->vehicleRepository->showVehicle($id), 'Vehicle Details', Response::HTTP_OK);
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
        $payload = $request->all();
        $id = $request->route('vehicle');
        return $this->successResponse($this->vehicleRepository->updateVehicle($payload, $id), 'Vehicle Updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->route('vehicle');
        return $this->successResponse($this->vehicleRepository->deleteVehicle($id), 'Vehicle Deleted', Response::HTTP_OK);
    }
}
