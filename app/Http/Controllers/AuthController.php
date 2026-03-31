<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['api_token'] = Str::random(60); // توليد توكن تلقائي عند التسجيل

        $user = User::create($validated);

        return response()->json([
            'user' => $user,
            'token' => $user->api_token
        ]);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        // توليد توكن جديد عند كل تسجيل دخول
        $user->api_token = Str::random(60);
        $user->save();

        return response()->json([
            'user' => $user,
            'token' => $user->api_token
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $user = $request->user(); // تأكد أن المستخدم مصادق عليه بواسطة auth:api
        $user->api_token = null;
        $user->save();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}