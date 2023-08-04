<?php

namespace App\Interfaces;

interface BookingStatusRepositoryInterface
{
    public function allBookingStatuses();
    public function createBookingStatus(array $data);
    public function updateBookingStatus(array $data, $id);
    public function deleteBookingStatus($id);
    public function showBookingStatus($id);
}
