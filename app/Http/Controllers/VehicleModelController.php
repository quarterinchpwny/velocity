<?php

namespace App\Http\Controllers;

use App\Interfaces\VehicleModelRepositoryInterface;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\VehicleModel;
use App\Http\Requests\StoreVehicleModelRequest;
use App\Http\Requests\UpdateVehicleModelRequest;

class VehicleModelController extends Controller
{

    private VehicleModelRepositoryInterface $vehicleModelRepository;

    public function __construct(VehicleModelRepositoryInterface $vehicleModelRepository)
    {
        $this->vehicleModelRepository = $vehicleModelRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->vehicleModelRepository->allVehicleModels(), 'All Car Models', Response::HTTP_OK);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleModelRequest $request)
    {
        $payload = $request->all();
        $id = $request->route('vehicle_model');
        return $this->successResponse($this->vehicleModelRepository->createVehicleModel($payload, $id), 'Car Model Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route('vehicle_model');
        return $this->successResponse($this->vehicleModelRepository->showVehicleModel($id), 'Car Model Details', Response::HTTP_OK);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleModelRequest  $request
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleModelRequest $request)
    {
        $payload = $request->all();
        $id = $request->route('vehicle_model');
        return $this->successResponse($this->vehicleModelRepository->updateVehicleModel($payload, $id), 'Car Model Updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $payload = $request->$request->route('vehicle_model');

        return $this->successResponse($this->vehicleModelRepository->deleteVehicleModel($payload), 'Car Model Deleted', Response::HTTP_OK);
    }
}
