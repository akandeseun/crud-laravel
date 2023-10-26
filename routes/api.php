<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/task', [TaskController::class, 'index'])->middleware(['auth:sanctum']);
// Route::get('/task/{id}', [TaskController::class, 'show'])->middleware(['auth:sanctum']);
// Route::post('/task', [TaskController::class, 'store'])->middleware(['auth:sanctum']);
// Route::patch('/task/{id}', [TaskController::class, 'update'])->middleware(['auth:sanctum']);
// Route::delete('/task/{id}', [TaskController::class, 'destroy'])->middleware(['auth:sanctum']);

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Group Task Routes

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/task', [TaskController::class, 'index']);
//     Route::get('/task/{id}', [TaskController::class, 'show']);
//     Route::post('/task', [TaskController::class, 'store']);
//     Route::patch('/task/{id}', [TaskController::class, 'update']);
//     Route::delete('/task/{id}', [TaskController::class, 'destroy']);
// });


Route::controller(TaskController::class)->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/task', 'index');
        Route::get('/task/{id}', 'show');
        Route::post('/task', 'store');
        Route::patch('/task/{id}', 'update');
        Route::delete('/task/{id}', 'destroy');
    });
});
