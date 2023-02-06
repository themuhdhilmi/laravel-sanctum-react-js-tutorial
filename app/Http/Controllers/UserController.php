<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return User::with('role')->paginate();
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create(
            $request->only('first_name', 'last_name', 'email')
            + ['password' => Hash::make(12345)]
        );

        return response($user, 201);
    }

    public function show($id)
    {
        return User::with('role')->find($id);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->only('first_name','last_name','email'));

        return response($user, 201);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response(null, 204);
    }
}
