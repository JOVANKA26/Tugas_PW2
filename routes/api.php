<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\GenreController;

use App\Models\Judul;
use App\Models\Genre;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Response;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/genre', [GenreController::class,'index']);
Route::get('/judul', [JudulController::class,'index']);

Route::post('/genre', [GenreController::class,'store']);
Route::post('/judul', [JudulController::class,'store']);

Route::patch('/genre/{id}', [GenreController::class,'update']);
Route::patch('/judul/{id}', [JudulController::class,'update']);

Route::delete('/genre/{id}', [GenreController::class,'destroy']);
Route::delete('/judul/{id}', [JudulController::class,'destroy']);

//Route::post('/register', [AuthController::class,'register']);
//Route::post('login', [AuthController::class, 'login']);