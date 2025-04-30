<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Users\Goalkeeper;
use App\Models\Users\InsidePlayer;
use App\Models\Users\Player;
use App\Models\Users\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            "nom"=> $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            "prenom"=> $request->prenom,
            "cin"=> $request->cin,
            "type_utilisateur"=> $request->type_utilisateur,
            "telephone"=> $request->telephone,
            "ville_residence"=> $request->ville_residence,
            "quartier"=> $request->quartier,
        ]);

        $player = Player::create([
            "poste" => $request->poste,
            "user_id" => $user->id,
        ]);

        $goalkeeper = Goalkeeper::create([
            "diving" => $request->diving,
            "reflex" => $request->reflex,
            "handling" => $request->handling,
            "kicking" => $request->kicking,
            "positionning" => $request->positionning,
            "speed" => $request->speed,
        ]);

        $insidePolyaer = InsidePlayer::create([
            "pace" => $request->pace,
            "dribbling" => $request->dribbling,
            "shooting" => $request->shooting,
            "defending" => $request->defending,
            "passing" => $request->passing,
            "physical" => $request->physical,
        ]);

        return response()-> json([
            "message" => "User created successfully",
            "user" => $user,
            "player" => $player,
            "goalkeeper" => $goalkeeper,
            "insidePlayer" => $insidePolyaer,

        ],201);
    }
}
