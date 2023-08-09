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

        return $this->successResponse($this->bookingStatusRepository->allBookingStatuses(), 'All Booking Statuses', Response::HTTP_OK);
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
        $id = $request->route('booking_status');

        return $this->successResponse($this->bookingStatusRepository->createBookingStatus($payload, $id), 'Booking Status Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route('booking_status');
        return $this->successResponse($this->bookingStatusRepository->showBookingStatus($id), 'Booking Status Details', Response::HTTP_OK);
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
        $id = $request->route('booking_status');
        return $this->successResponse($this->bookingStatusRepository->updateBookingStatus($payload, $id), 'Booking Status Updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->route('booking_status');
        return $this->successResponse($this->bookingStatusRepository->deleteBookingStatus($id), 'Booking Status Deleted', Response::HTTP_OK);
    }
}
