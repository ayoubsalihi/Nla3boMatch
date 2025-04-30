<?php

use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('users',UserController::class);
