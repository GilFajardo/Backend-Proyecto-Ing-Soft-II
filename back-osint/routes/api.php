<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de autenticación (públicas)
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
Route::post('/verify', [App\Http\Controllers\Api\AuthController::class, 'verify']);

// Rutas protegidas
Route::middleware('auth:api')->get('/user', [App\Http\Controllers\Api\UserController::class, 'show']);

// Ruta para el dashboard del administrador
Route::middleware(['web'])->get('/admin/dashboard', [AdminDashboardController::class, 'index']);

Route::middleware(['web'])->group(function () {
    Route::get('/admin/casos', [AdminDashboardController::class, 'getAllCases']);
    Route::get('/admin/capturistas', [AdminDashboardController::class, 'getCapturistas']);
    Route::get('/admin/usuarios', [AdminDashboardController::class, 'getAllUsers']);
    Route::post('/admin/usuarios', [AdminDashboardController::class, 'storeUsuario']);
    Route::post('/admin/casos', [AdminDashboardController::class, 'storeCaso']);
    Route::put('/admin/casos/{id}', [AdminDashboardController::class, 'updateCaso']);
    Route::get('/admin/bitacora', [AdminDashboardController::class, 'getLogActividad']);
    Route::put('/admin/usuarios/{id}', [AdminDashboardController::class, 'updateUsuario']);
    Route::delete('/admin/usuarios/{id}', [AdminDashboardController::class, 'deleteUsuario']);
    Route::delete('/admin/casos/{id}', [AdminDashboardController::class, 'deleteCaso']);
});
// Alexa Skills webhook endpoint
// No Laravel auth middleware - Alexa handles authentication via OAuth access tokens
Route::post('/alexa/webhook', [App\Http\Controllers\AlexaController::class, 'handleRequest']);
