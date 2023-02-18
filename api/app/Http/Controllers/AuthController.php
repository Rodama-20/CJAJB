<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name'                  => 'required|max:255',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response($user + [
            'token' => $user->createToken('API TOKEN')->plainTextToken,
        ], 201);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return response([
                'error' => 'Invalid credentials',
            ], 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('token')->plainTextToken;

        return response([
            'token' => $token,
            'name'  => $user->name,
        ], 200);
    }
}
