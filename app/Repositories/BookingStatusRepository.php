<?php

namespace App\Repositories;

use App\Interfaces\BookingStatusRepositoryInterface;
use App\Models\BookingStatus;

class BookingStatusRepository implements BookingStatusRepositoryInterface
{

    public function allBookingStatuses()
    {
        return BookingStatus::all();
    }
    public function createBookingStatus(array $data)
    {
        return BookingStatus::create($data);
    }

    public function updateBookingStatus(array $data, $id)
    {
        $bookingStatus = $this->showBookingStatus($id);
        $bookingStatus->update($data);
        return $bookingStatus;
    }

    public function deleteBookingStatus($id)
    {
        $bookingStatus = $this->showBookingStatus($id);
        $bookingStatus->delete();
        return $bookingStatus;
    }

    public function showBookingStatus($id)
    {
        return BookingStatus::findOrFail($id);
    }
}
