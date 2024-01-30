<?php

namespace marketplace\src\Http\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use marketplace\src\Models\user;

class AuthService
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return string  $token
     */
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user->createToken('token-name')->plainTextToken;
    }

    /**
     * Log in the user.
     *
     * @param array $credentials
     * @return string  $token
     */
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return Auth::user()->createToken('token-name')->plainTextToken;
        }

        return null;
    }

    /**
     * Log out the user.
     *
     * @return void
     */
    public function logout()
    {
        Auth::user()->tokens()->delete();
    }
}
