<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return response()->json([
                'message' => 'Пользователь не найден'
            ], 422);
        }
        if (!Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Пароль не подходит'
            ], 422);
        }

        $token = $user->createToken('api')->plainTextToken;

        return [
            'token' => $token
        ];
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $token = $user->createToken('api')->plainTextToken;

        return [
            'token' => $token
        ];
    }
}
