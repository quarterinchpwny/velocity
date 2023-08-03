<?php

namespace App\Repositories;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;

class BookingRepository implements BookingRepositoryInterface
{

    public function allBookings()
    {
        return Booking::all();
    }

    public function createBooking(array $data)
    {
        return Booking::create($data);
    }

    public function updateBooking(array $data, $code)
    {
        $booking = $this->showBooking($code);
        $booking->update($data);
        return $booking;
    }

    public function deleteBooking($code)
    {
        $booking = $this->showBooking($code);
        $booking->delete();
        return $booking;
    }

    public function showBooking($code)
    {
        return Booking::findOrFail($code);
    }
}
