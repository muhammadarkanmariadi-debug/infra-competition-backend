<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SocialProfile;
use App\Models\token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Google_Client;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\SocialMedia;

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

        if ($user) {
            $socialProfile =  SocialProfile::create([
                'user_id' => $user->id,
                'description' => null,
                'profile_photo' => null,
                'organization_id' => null,
                'class_id' => null,
                'organization_role_id' => null,
                'status' => null,
                'position' => null,

            ]);

            $socialMedia = SocialMedia::create([
                'user_id' => $user->id,
                'type' => null,
                'url' => null,
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'User sudah dibuat',
            'data' => $user,
            'profile' => $socialProfile,
            'socialMedia' => $socialMedia
        ], 201);
    }


    public function loginWithGoogle(Request $request)
    {
        $googleToken = $request->input('token');

        // Verifikasi token dari frontend
        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($googleToken);

        if (!$payload) {
            return response()->json(['error' => 'Invalid Google token'], 401);
        }

        $checkUsers = User::where('email', $payload['email'])->first();

        if ($checkUsers) {
            $user = $checkUsers;
        } else {
            $user = User::create([
                'name' => $payload['name'],
                'email' => $payload['email'],
                'password' => Hash::make(uniqid()), // Generate a random password
            ]);

            if ($user) {
                $socialProfile =  SocialProfile::create([
                    'user_id' => $user->id,
                    'description' => null,
                    'profile_photo' => null,
                    'organization_id' => null,
                    'class_id' => null,
                    'organization_role_id' => null,
                    'status' => null,
                    'position' => null,

                ]);
            }
        }


        $token = auth()->guard('api')->attempt($user);

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }


    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        if (!$token = auth()->guard('api')->attempt($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal',
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Login Berhasil',
            'token' => $token,
        ], 200);
    }

    public function me()
    {

        $user = Auth::user();
        $userr = User::with('socialmedia', 'blog', 'socialProfile')->find($user->id);




        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'anda belum login',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data User',
            'data' => $userr,
        ], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        auth()->guard('api')->logout(true);

        if (!$token) {
            return response()->json([
                'status' => false,
                'message' => 'anda belum login',
            ], 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Logout Berhasil',
        ], 200);
    }


    public function adminUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'role' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 409);
        }
        $user = User::find($id);
        $user->update($validate->validated());
        return response()->json([
            'status' => true,
            'message' => 'User sudah diupdate',
            'data' => $user
        ], 201);
    }

}
