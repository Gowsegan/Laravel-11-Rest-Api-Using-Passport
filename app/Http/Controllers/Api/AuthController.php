<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $token]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials'], 401);
        }

        $token = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $token]);
    }

    public function refresh(Request $request)
    {
        //Code to refresh the token. Passport handles most of this.
        //You may need to validate the refresh token that comes in the request.
        $token = auth()->user()->createToken('authToken')->accessToken;
        return response(['access_token' => $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['message' => 'Successfully logged out']);
    }

    public function resetPassword(Request $request)
    {
        // Add password reset logic here.
        // This will likely involve sending a reset link to the user's email.
        // And then validating that link before allowing them to change their password.
        // Laravel's built in password reset functionality can be used.
        // look at the password reset documentation for laravel.
        return response(['message' => 'Password reset functionality.']);
    }
}
