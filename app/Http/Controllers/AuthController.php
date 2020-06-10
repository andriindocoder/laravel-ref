<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $register = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        if($register) {
            return response()->json([
                'success' => true,
                'message' => 'Registration success',
                'data' => $register
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'data' => ''
            ], 400);
        }
    }

    public function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if(Hash::check($password, $user->password)) {
            $apiToken = base64_encode(Str::random(40));

            $user->update([
                'api_token' => $apiToken
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Login Success',
                'data' => [
                    'user' => $user,
                    'api_token' => $apiToken
                ]
                ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Failed',
                'data' => ''
            ]);
        }
    }

}
