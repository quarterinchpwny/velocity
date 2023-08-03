<?php

namespace App\Interfaces;

interface BookingRepositoryInterface
{
    public function allBookings();
    public function createBooking(array $data);
    public function updateBooking(array $data, $id);
    public function deleteBooking($id);
    public function showBooking($id);
}
