<?php

namespace App\Http\Controllers;

use App\Interfaces\BookingStatusRepositoryInterface;
use App\Models\BookingStatus;
use App\Http\Requests\StoreBookingStatusRequest;
use App\Http\Requests\UpdateBookingStatusRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BookingStatusController extends Controller
{
    private BookingStatusRepositoryInterface $bookingStatusRepository;

    public function __construct(BookingStatusRepositoryInterface $bookingStatusRepository)
    {
        $this->bookingStatusRepository = $bookingStatusRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => $this->bookingStatusRepository->allBookingStatuses()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingStatusRequest $request)
    {
        $payload = $request->all();
        return response()->json(['data' => $this->bookingStatusRepository->createBookingStatus($payload)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $payload = $request->only(['id']);
        return response()->json(['data' => $this->bookingStatusRepository->showBookingStatus($payload)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingStatusRequest  $request
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingStatusRequest $request)
    {
        $payload = $request->all();
        $id = $payload['id'];
        return response()->json(['data' => $this->bookingStatusRepository->updateBookingStatus($payload, $id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->only(['id']);
        $this->bookingStatusRepository->deleteBookingStatus($id);
        return response()->json(['data' => 'Booking Status Deleted Successfully']);
    }
}
