<?php

namespace App\Interfaces;

interface BookingStatusRepositoryInterface
{
    public function allBookingStatuses();
    public function createBookingStatus(array $data);
    public function updateBookingStatus(array $data, $code);
    public function deleteBookingStatus($code);
    public function showBookingStatus($code);
}
