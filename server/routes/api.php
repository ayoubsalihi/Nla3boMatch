<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('users',UserController::class);
Route::post("/register",[RegisterController::class,"register"]);
Route::post("/login",[LoginController::class,"login"]);