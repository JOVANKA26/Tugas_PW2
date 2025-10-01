<?php

use App\Http\Controllers\JudulController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdiController;
use App\Models\Judul;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Response;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fakultas', [JudulController::class,'index']);

Route::post('/fakultas', [FakultasController::class,'store']);

Route::patch('/fakultas/{id}', [FakultasController::class,'update']);

Route::delete('/fakultas/{id}', [FakultasController::class,'destroy']);

//Route::post('/register', [AuthController::class,'register']);
//Route::post('login', [AuthController::class, 'login']);