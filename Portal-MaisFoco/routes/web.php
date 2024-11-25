<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

// Agrupando as rotas relacionadas a Notices
Route::prefix('notices')->group(function () {
    Route::get('/', [NoticeController::class, 'index']);
    Route::post('/', [NoticeController::class, 'store']);
    Route::patch('/{id}', [NoticeController::class, 'update']);
    Route::delete('/{id}', [NoticeController::class, 'destroy']);
});

// Agrupando as rotas relacionadas a Notifications
Route::prefix('notifications')->group(function () {
    Route::get('/', [NotificationController::class, 'index']);
    Route::post('/', [NotificationController::class, 'store']);
    Route::patch('/{id}', [NotificationController::class, 'update']);
    Route::delete('/{id}', [NotificationController::class, 'destroy']);
});

// Agrupando as rotas relacionadas a Notification Users
Route::prefix('notification-users')->group(function () {
    Route::get('/', [NotificationUserController::class, 'index']);
    Route::post('/', [NotificationUserController::class, 'store']);
    Route::patch('/{id}', [NotificationUserController::class, 'update']);
    Route::delete('/{id}', [NotificationUserController::class, 'destroy']);
});
