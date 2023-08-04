<?php

namespace App\Http\Controllers;

use App\Interfaces\CarModelRepositoryInterface;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Http\Requests\StoreCarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;

class CarModelController extends Controller
{

    private CarModelRepositoryInterface $carModelRepository;

    public function __construct(CarModelRepositoryInterface $carModelRepository)
    {
        $this->carModelRepository = $carModelRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json(['data' => $this->carModelRepository->allCarModels()], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarModelRequest $request)
    {
        $payload = $request->all();
        return response()->json(['data' => $this->carModelRepository->createCarModel($payload)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $payload = $request->only(['id']);
        return response()->json(['data' => $this->carModelRepository->showCarModel($payload)], 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarModelRequest  $request
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarModelRequest $request)
    {
        $payload = $request->all();
        $id = $payload['id'];
        return response()->json(['data' => $this->carModelRepository->updateCarModel($payload, $id)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $payload = $request->only(['id']);
        return response()->json(['data' => $this->carModelRepository->deleteCarModel($payload)], 200);
    }
}
