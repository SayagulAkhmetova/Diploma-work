<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function show(User $user)
    {
        return new UserResource($user);
    }


    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['success' => true]);
    }
}
