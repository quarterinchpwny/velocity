<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\ManufacturerRepositoryInterface;

use App\Models\Manufacturer;
use App\Http\Requests\StoreManufacturerRequest;
use App\Http\Requests\UpdateManufacturerRequest;

class ManufacturerController extends Controller
{
    private ManufacturerRepositoryInterface $manufacturerRepository;

    public function __construct(ManufacturerRepositoryInterface $manufacturerRepository)
    {
        $this->manufacturerRepository = $manufacturerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => $this->manufacturerRepository->allManufacturers()], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreManufacturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManufacturerRequest $request)
    {
        $payload = $request->all();
        return response()->json(['data' => $this->manufacturerRepository->createManufacturer($payload)], Response::HTTP_CREATED);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $payload = $request->only(['id']);
        return response()->json(['data' => $this->manufacturerRepository->showManufacturer($payload)], 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManufacturerRequest  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManufacturerRequest $request)
    {
        $payload = $request->all();
        $id = $payload['id'];
        return response()->json(['data' => $this->manufacturerRepository->updateManufacturer($payload, $id)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->only(['id']);
        return response()->json(['data' => $this->manufacturerRepository->deleteManufacturer($id)], 200);
    }
}
