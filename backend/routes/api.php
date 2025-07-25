<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

    // update profile
    // blog [post get]
    // in active blog [post]
    // bookmark blog [post]
    // like blog [post]
    // comment [get post]
    // get book marks
    // get our blogs
    // follow author
    // notification


    Route::post('/logout', [AuthController::class, 'logout']);
});
