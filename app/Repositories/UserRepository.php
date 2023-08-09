<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function allUsers()
    {
        return User::all();
    }
    public function createUser(array $data)
    {
        return User::create($data);
    }
    public function updateUser(array $data, $id)
    {
        $user = $this->showUser($id);
        $user->update($data);
        return $user;
    }
    public function deleteUser($id)
    {
        $user = $this->showUser($id);
        $user->delete();
        return $user;
    }
    public function showUser($id)
    {
        return User::findOrFail($id);
    }
}
