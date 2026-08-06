<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(60);

        // Save token in password_reset_tokens table
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        // Send email
        $resetUrl = env('FRONTEND_URL', 'http://localhost:5173') . '/reset-password?token=' . $token . '&email=' . urlencode($request->email);
        
        try {
            Mail::to($request->email)->send(new ResetPasswordMail($resetUrl));
        } catch (\Exception $e) {
            // Log error
        }

        return response()->json([
            'message' => 'Enlace de recuperación enviado al correo electrónico.',
            'reset_url' => env('APP_ENV') === 'local' ? $resetUrl : null
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetRecord) {
            return response()->json(['message' => 'Token inválido o expirado.'], 400);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->must_change_password = false;
        $user->save();

        // Delete token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return response()->json(['message' => 'Contraseña restablecida con éxito.']);
    }
}
