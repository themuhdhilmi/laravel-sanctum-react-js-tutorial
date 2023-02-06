<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class RoleController extends Controller
{
    public function index()
    {
        return Role::with('users')->paginate();
    }

    public function store(Request $request)
    {
        $role = Role::create($request->only('name'));

        return response($role, 201);
    }

    public function show($id)
    {
        return Role::with('users')->find($id);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->update($request->only('name'));

        return response($role, 201);
    }

    public function destroy($id)
    {
        Role::destroy($id);

        return response(null, 204);
    }
}
