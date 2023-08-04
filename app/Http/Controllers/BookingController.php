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
        return response()->json(['data' => $this->bookingRepository->allBookings()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $payload = $request->all();;
        return response()->json(['data' => $this->bookingRepository->createBooking($payload)], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $payload = $request->ony(['id']);
        return response()->json(['data' => $this->bookingRepository->showBooking($payload)], 200);
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
        $id = $payload(['id']);
        return response()->json(['data' => $this->bookingRepository->updateBooking($payload, $id)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->only(['id']);
        $this->bookingRepository->deleteBooking($id);
        return response()->json(['message' => 'Delete success', Response::HTTP_NO_CONTENT]);
    }
}
