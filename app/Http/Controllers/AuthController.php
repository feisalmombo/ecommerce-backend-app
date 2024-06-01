<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Define AuthController class which extends Controller
class AuthController extends Controller
{

    public function register(Request $request)
    {
        // Validate incoming request fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Create new User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Return user data as JSON with a 201 (created) HTTP status code
            return response()->json(['user' => $user], 201);
    }

    // Function to handle user login
    public function login(Request $request)
    {
        // Validate incoming request fields
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);


        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        $user = $request->user();
        $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token]);
    }

    // Function to handle user logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

            return response()->json(['message' => 'Logged out']);
    }


    // Function to handle refresh for token
    public function refresh()
    {
        return response([
            'status' => 'success',
            'user' => Auth::user(),
            ]);
    }
}
