<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function signIn(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::select('id', 'first_name', 'last_name', 'email', 'password')->where('email', $credentials['email'])->first();

        if (!$user || !password_verify($credentials['password'], $user->password)) {
            return response()->json([trans('auth_controller_unauthorized')], 401);
        }

        $secret = env('JWT_SECRET');
        $jwt = JWT::encode($user->attributesToArray(), $secret, 'HS256');

        $user->api_token = $jwt;
        $user->save();

        return response()->json($user);
    }
}
