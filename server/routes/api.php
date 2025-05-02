<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Competitions\CompetitionController;
use App\Http\Controllers\Competitions\GroupController;
use App\Http\Controllers\Competitions\PartidoController;
use App\Http\Controllers\Competitions\PartidoTeamController;
use App\Http\Controllers\Posts\ImageController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Posts\VideoController;
use App\Http\Controllers\Teams\CompetitionTeamController;
use App\Http\Controllers\Teams\GroupTeamController;
use App\Http\Controllers\Teams\TeamChatController;
use App\Http\Controllers\Teams\TeamController;
use App\Http\Controllers\Terrains\AcademyController;
use App\Http\Controllers\Terrains\ReservationController;
use App\Http\Controllers\Terrains\TerrainController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\Users\ChatController;
use App\Http\Controllers\Users\GoalkeeperController;
use App\Http\Controllers\Users\InsidePlayerController;
use App\Http\Controllers\Users\MessageController;
use App\Http\Controllers\Users\PlayerController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;


Route::post("/register",[RegisterController::class,"register"]);
Route::post("/login",[LoginController::class,"login"]);

// Users side
Route::resource('users',UserController::class)->middleware("cookie","auth:sanctum");
Route::resource('players',PlayerController::class)->middleware('cookie',"auth:sanctum");
Route::resource("admins",AdminController::class)->middleware("cookie","auth:sanctum");
Route::resource("teams",TeamController::class)->middleware("cookie","auth:sanctum");
Route::resource("inside_players",InsidePlayerController::class)->middleware("cookie","auth:sanctum");
Route::resource("goalkeepers",GoalkeeperController::class)->middleware("cookie","auth:sanctum");
Route::resource("messages",MessageController::class)->middleware("cookie","auth:sanctum");
Route::resource("chat",ChatController::class)->middleware("cookie","auth:sanctum");

// Terrains side
Route::resource("academies",AcademyController::class)->middleware("cookie","auth:sanctum");
Route::resource("reservations",ReservationController::class)->middleware("cookie","auth:sanctum");
Route::resource("terrains",TerrainController::class)->middleware("cookie","auth:sanctum");

// Teams side
Route::resource("team",TeamController::class)->middleware("cookie","auth:sanctum");
Route::resource("team_chats",TeamChatController::class)->middleware("cookie","auth:sanctum");
Route::resource("competition_team",CompetitionTeamController::class)->middleware("cookie","auth:sanctum");
Route::resource("group_team",GroupTeamController::class)->middleware("cookie","auth:sanctum");

// Posts side
Route::resource("posts",PostController::class)->middleware("cookie","auth:sanctum");
Route::resource("images",ImageController::class)->middleware("cookie","auth:sanctum");
Route::resource("videos",VideoController::class)->middleware("cookie","auth:sanctum");

// Competitions side
Route::resource("competitions",CompetitionController::class)->middleware("cookie","auth:sanctum");
Route::resource("matches",PartidoController::class)->middleware("cookie","auth:sanctum");
Route::resource("team_match",PartidoTeamController::class)->middleware("cookie","auth:sanctum");
Route::resource("groups",GroupController::class)->middleware("cookie","auth:sanctum");
