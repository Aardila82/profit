<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\UserRutina;

class RutinaController extends Controller
{
    /**
     * Get the current assigned routine and history
     */
    public function current(Request $request)
    {
        $user = $request->user();
        
        // Auto-assign if no current routine exists
        $actual = $user->rutina_actual()->with('rutina')->first();
        if (!$actual) {
            $actual = $this->assignRoutine($user);
        }

        $historial = $user->rutinas_historial()->with('rutina')->where('estado', 'historico')->get();

        return response()->json([
            'actual' => $actual ? $actual->rutina : null,
            'assigned_at' => $actual ? $actual->assigned_at : null,
            'historial' => $historial
        ]);
    }

    /**
     * Request a change of routine
     */
    public function change(Request $request)
    {
        $user = $request->user();
        $actual = $user->rutina_actual()->first();
        $currentRutinaId = $actual ? $actual->rutina_id : null;

        // Archive current
        if ($actual) {
            $actual->update(['estado' => 'historico']);
        }

        // Assign new excluding current
        $newRoutine = $this->assignRoutine($user, $currentRutinaId);

        return response()->json([
            'message' => 'Rutina cambiada exitosamente',
            'actual' => $newRoutine ? $newRoutine->rutina : null
        ]);
    }

    /**
     * Admin: Request a change of routine for a specific client
     */
    public function changeForClient(Request $request, $id)
    {
        // Must be admin or trainer
        $admin = $request->user();
        if ($admin->role !== 'admin' && $admin->role !== 'entrenador') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $user = \App\Models\User::findOrFail($id);
        $actual = $user->rutina_actual()->first();
        $currentRutinaId = $actual ? $actual->rutina_id : null;

        // Archive current
        if ($actual) {
            $actual->update(['estado' => 'historico']);
        }

        // Assign new excluding current
        $newRoutine = $this->assignRoutine($user, $currentRutinaId);

        return response()->json([
            'message' => 'Rutina rotada exitosamente',
            'actual' => $newRoutine ? $newRoutine->rutina : null
        ]);
    }

    /**
     * Stream a private video file securely
     */
    public function streamVideo(Request $request, $filename)
    {
        $token = $request->query('token');
        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $accessToken = \Laravel\Sanctum\PersonalAccessToken::findToken($token);
        if (!$accessToken) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $path = storage_path('app/videos/' . $filename);
        if (!file_exists($path)) {
            return response()->json(['message' => 'Video not found'], 404);
        }
        
        return response()->file($path, [
            'Content-Type' => 'video/mp4',
            'Cache-Control' => 'private, max-age=604800', // Cache por 7 días
            'Accept-Ranges' => 'bytes',
        ]);
    }

    /**
     * Core logic: Assigns a random compatible routine, optionally excluding an ID
     */
    private function assignRoutine($user, $excludeId = null)
    {
        $query = Rutina::query();
        
        // Match profile fields if user has them set, otherwise allow null/general routines
        if ($user->genero) {
            $query->where(function($q) use ($user) {
                $q->where('genero', $user->genero)->orWhereNull('genero');
            });
        }
        if ($user->nivel_entrenamiento) {
            $query->where(function($q) use ($user) {
                $q->where('nivel_entrenamiento', $user->nivel_entrenamiento)->orWhereNull('nivel_entrenamiento');
            });
        }
        if ($user->objetivo) {
            $query->where(function($q) use ($user) {
                $q->where('objetivo', $user->objetivo)->orWhereNull('objetivo');
            });
        }

        // Exclude previous routine if requesting change
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        $rutinasCompatibles = $query->get();

        if ($rutinasCompatibles->isEmpty()) {
            // Fallback to any generic routine if no strict match
            $rutinasCompatibles = Rutina::whereNull('genero')->get();
        }

        if ($rutinasCompatibles->isNotEmpty()) {
            // Randomly pick one
            $selected = $rutinasCompatibles->random();
            
            return UserRutina::create([
                'user_id' => $user->id,
                'rutina_id' => $selected->id,
                'estado' => 'actual'
            ]);
        }

        return null;
    }
}
