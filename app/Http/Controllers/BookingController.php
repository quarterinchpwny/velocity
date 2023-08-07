<?php

namespace App\Http\Controllers;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BookingRepositoryInterface $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->bookingRepository->allBookings(), 'All Bookings', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $payload = $request->all();
        return $this->successResponse($this->bookingRepository->createBooking($payload), 'Booking Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->route('booking');
        return $this->successResponse($this->bookingRepository->showBooking($id), 'Booking Details', Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request)

    {
        $payload = $request->all();
        $id = $request->route('booking');
        return $this->successResponse($this->bookingRepository->updateBooking($payload, $id), 'Booking Updated', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->route('booking');
        return $this->successResponse($this->bookingRepository->deleteBooking($id), 'Booking Deleted', Response::HTTP_OK);
    }
}
