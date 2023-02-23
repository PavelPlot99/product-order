<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoginRequest;
use App\Http\Resources\Api\User\LoginResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (
            $user = User::query()->firstWhere('email', $request->get('email')) and
            Hash::check($request->get('password'), $user->password)
        ) {
            return new LoginResource($user);
        } else {
            return JsonResource::make([
                'status' => false,
                'message' => 'User not found'
            ])->response()->setStatusCode(404);
        }
    }
}
