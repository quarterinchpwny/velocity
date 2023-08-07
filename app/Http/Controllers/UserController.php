<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\User;

class UserController extends Controller
{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return response()->json(['data' => $this->userRepository->allUsers()], 200);
        return $this->success($this->userRepository->allUsers(), 'Users retrieved successfully', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UpdateUserRequest $request)
    {

        $payload = $request->route('user');

        // return response()->json(['data' => $this->userRepository->showUser($payload)], 200);
        return $this->success($this->userRepository->showUser($payload), 'User retrieved successfully', Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $payload = $request->all();
        $id = $payload['id'];
        // return response()->json(['data' => $this->userRepository->updateUser($payload, $id)], 200);
        return $this->success($this->userRepository->updateUser($payload, $id), 'User updated successfully', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {

        $payload = $request->only(['id']);
        // return response()->json(['data' => $this->userRepository->deleteUser($payload)], 200);
        return $this->success($this->userRepository->deleteUser($payload), 'User deleted successfully', Response::HTTP_OK);
    }
}
