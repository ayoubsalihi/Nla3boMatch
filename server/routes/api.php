<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\PlayerController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


Route::post("/register",[RegisterController::class,"register"]);
Route::post("/login",[LoginController::class,"login"]);

Route::resource('users',UserController::class)->middleware("cookie","auth:sanctum");
Route::resource('players',PlayerController::class)->middleware('cookie',"auth:sanctum");