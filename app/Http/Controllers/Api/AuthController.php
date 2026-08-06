<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'role' => $user->role
        ]);
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();
        
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->must_change_password = false;
        $user->save();

        return response()->json(['message' => 'Contraseña actualizada con éxito']);
    }
}
