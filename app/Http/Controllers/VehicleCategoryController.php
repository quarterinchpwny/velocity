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

        return response()->json(['data' => $this->vehicleCategoryRepository->allVehicleCategories()], 200);
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
        return response()->json(['data' => $this->vehicleCategoryRepository->createVehicleCategory($payload)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $payload = $request->only(['id']);
        return response()->json(['data' => $this->vehicleCategoryRepository->showVehicleCategory($payload)], 200);
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
        $id = $payload['id'];
        return response()->json(['data' => $this->vehicleCategoryRepository->updateVehicleCategory($payload, $id)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleCategory  $vehicleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateVehicleCategoryRequest $request)
    {
        $id = $request->only(['id']);
        return response()->json(['data' => $this->vehicleCategoryRepository->deleteVehicleCategory($id)], 200);
    }
}
