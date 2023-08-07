<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function allUsers();
    public function updateUser(array $data, $id);
    public function deleteUser($id);
    public function showUser($id);
}
