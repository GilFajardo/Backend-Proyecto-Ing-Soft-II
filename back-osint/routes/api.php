<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Importamos los controladores aquí arriba para mantener las rutas limpias
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AlexaController;

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

// ----------------------------------------------------------------------
// 1. Rutas de autenticación (Públicas)
// ----------------------------------------------------------------------
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/verify', [AuthController::class, 'verify']);

// ----------------------------------------------------------------------
// 2. Rutas protegidas por Token (API)
// ----------------------------------------------------------------------
Route::middleware('auth:api')->get('/user', [UserController::class, 'show']);

// ----------------------------------------------------------------------
// 3. Rutas del Panel de Administración (Middleware WEB)
// ----------------------------------------------------------------------
// Nota: Usas el middleware 'web' aquí. Esto habilitará sesiones y protección CSRF.
// Asegúrate de que esto es lo que quieres en un archivo api.php.

Route::middleware(['web'])->group(function () {
    // Dashboard principal
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);

    // Gestión de Casos
    Route::get('/admin/casos', [AdminDashboardController::class, 'getAllCases']);
    Route::post('/admin/casos', [AdminDashboardController::class, 'storeCaso']);
    Route::put('/admin/casos/{id}', [AdminDashboardController::class, 'updateCaso']);
    Route::delete('/admin/casos/{id}', [AdminDashboardController::class, 'deleteCaso']);

    // Gestión de Usuarios
    Route::get('/admin/usuarios', [AdminDashboardController::class, 'getAllUsers']);
    Route::post('/admin/usuarios', [AdminDashboardController::class, 'storeUsuario']);
    Route::put('/admin/usuarios/{id}', [AdminDashboardController::class, 'updateUsuario']);
    Route::delete('/admin/usuarios/{id}', [AdminDashboardController::class, 'deleteUsuario']);

    // Otros
    Route::get('/admin/capturistas', [AdminDashboardController::class, 'getCapturistas']);
    Route::get('/admin/bitacora', [AdminDashboardController::class, 'getLogActividad']);
});

// ----------------------------------------------------------------------
// 4. Webhook para Alexa
// ----------------------------------------------------------------------
// Sin middleware de auth de Laravel, Alexa usa su propia autenticación OAuth
Route::post('/alexa/webhook', [AlexaController::class, 'handleRequest']);