<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminClientController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $clientes = User::with('creator')->where('role', 'cliente')->orderBy('created_at', 'desc')->get();
        return response()->json(['clientes' => $clientes]);
    }

    public function store(Request $request)
    {
        // En una app real, usarías policies/gates para verificar que el usuario sea admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $messages = [
            'email.unique' => 'Este correo electrónico ya está registrado. Por favor usa otro.',
            'required' => 'El campo :attribute es obligatorio.',
            'fecha_vencimiento.after_or_equal' => 'La fecha de vencimiento debe ser igual o posterior a la fecha de inicio.',
            'numeric' => 'El campo :attribute debe ser un número válido.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'email.email' => 'Debes ingresar un correo electrónico válido.'
        ];

        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'nullable|email|unique:users',
            'celular' => 'required|string',
            'peso_actual' => 'required|numeric',
            'role' => 'required|in:admin,cliente',
            'fecha_inicio' => 'required|date',
            'fecha_vencimiento' => 'required|date|after_or_equal:fecha_inicio',
            'edad' => 'nullable|integer',
            'altura' => 'nullable|numeric',
            'genero' => 'nullable|string',
            'objetivo' => 'nullable|string',
            'lesiones' => 'nullable|string'
        ], $messages);

        // Generate username and password
        $username = strtolower(str_replace(' ', '', $request->nombre . $request->apellido)) . rand(10, 99);
        $password = Str::random(8);

        $client = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'username' => $username,
            'email' => $request->email,
            'password' => bcrypt($password),
            'role' => $request->role,
            'celular' => $request->celular,
            'peso_actual' => $request->peso_actual,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'must_change_password' => true,
            'edad' => $request->edad,
            'altura' => $request->altura,
            'genero' => $request->genero,
            'objetivo' => $request->objetivo,
            'lesiones' => $request->lesiones,
            'created_by_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Cliente creado exitosamente',
            'credentials' => [
                'username' => $username,
                'password' => $password
            ]
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $messages = [
            'email.unique' => 'Este correo electrónico ya está registrado. Por favor usa otro.',
            'required' => 'El campo :attribute es obligatorio.',
            'fecha_vencimiento.after_or_equal' => 'La fecha de vencimiento debe ser igual o posterior a la fecha de inicio.',
            'numeric' => 'El campo :attribute debe ser un número válido.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'email.email' => 'Debes ingresar un correo electrónico válido.'
        ];

        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'celular' => 'required|string',
            'peso_actual' => 'required|numeric',
            'role' => 'required|in:admin,cliente',
            'fecha_inicio' => 'required|date',
            'fecha_vencimiento' => 'required|date|after_or_equal:fecha_inicio',
            'edad' => 'nullable|integer',
            'altura' => 'nullable|numeric',
            'genero' => 'nullable|string',
            'objetivo' => 'nullable|string',
            'lesiones' => 'nullable|string'
        ], $messages);

        $client = User::findOrFail($id);

        $client->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'celular' => $request->celular,
            'peso_actual' => $request->peso_actual,
            'role' => $request->role,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'edad' => $request->edad,
            'altura' => $request->altura,
            'genero' => $request->genero,
            'objetivo' => $request->objetivo,
            'lesiones' => $request->lesiones,
        ]);

        return response()->json([
            'message' => 'Cliente actualizado exitosamente',
            'client' => $client
        ]);
    }
}
