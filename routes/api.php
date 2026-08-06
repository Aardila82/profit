<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminClientController;
use App\Http\Controllers\Api\ClientProfileController;
use App\Http\Controllers\Api\PasswordResetController;

use App\Http\Controllers\Api\PlanController;

// Rutas Públicas
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink']);
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword']);
Route::get('/plans', [PlanController::class, 'index']);

// Rutas Protegidas
Route::middleware('auth:sanctum')->group(function () {
    // Rutas de Admin
    Route::get('/admin/clientes', [AdminClientController::class, 'index']);
    Route::post('/admin/clientes', [AdminClientController::class, 'store']);
    Route::put('/admin/clientes/{id}', [AdminClientController::class, 'update']);
    
    Route::put('/admin/plans/{id}', [PlanController::class, 'updatePlan']);
    Route::put('/admin/settings', [PlanController::class, 'updateSetting']);
    
    // Rutas de Cliente
    Route::get('/cliente/perfil', [ClientProfileController::class, 'show']);
    Route::post('/cliente/change-password', [AuthController::class, 'changePassword']);
});
