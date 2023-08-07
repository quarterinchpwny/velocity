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
        return $this->successResponse($this->carModelRepository->allCarModels(), 'All Car Models', Response::HTTP_OK);
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
        $id = $request->route('car_model');
        return $this->successResponse($this->carModelRepository->createCarModel($payload, $id), 'Car Model Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route('car_model');
        return $this->successResponse($this->carModelRepository->showCarModel($id), 'Car Model Details', Response::HTTP_OK);
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
        $id = $request->route('car_model');
        return $this->successResponse($this->carModelRepository->updateCarModel($payload, $id), 'Car Model Updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $payload = $request->$request->route('car_model');

        return $this->successResponse($this->carModelRepository->deleteCarModel($payload), 'Car Model Deleted', Response::HTTP_OK);
    }
}
