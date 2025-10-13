<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use GuzzleHttp\Psr7\Query;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 409);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User sudah dibuat',
            'data' => $user,
        ], 201);
    }


    public function login(Request $request)
    {
        $data = $request->only('name', 'password');

        if (!$token = auth()->guard('api')->attempt($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal',
            ], 401);
        }

        $user = auth()->guard('api')->user();

        token::create([
            'user_id'   => $user->id,
            'token'     => $token,
            'expires_at' => now()->addHours(1),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Login Berhasil',
            'token' => $token,
        ], 200);
    }

    public function me(Request $request)
    {

        $user = auth()->guard('api')->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'anda belum login',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data User',
            'data' => $user,
        ], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        auth()->guard('api')->logout(true);
        if ($token) {
            token::where('token', $token)->delete();
        }

        return response()->json([
            'status' => true,
            'message' => 'Logout Berhasil',
        ], 200);
    }
}
