<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Users\Goalkeeper;
use App\Models\Users\InsidePlayer;
use App\Models\Users\Player;
use App\Models\Users\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "cin" => $request->cin,
            "type_utilisateur" => $request->type_utilisateur,
            "telephone" => $request->telephone,
            "ville_residence" => $request->ville_residence,
            "quartier" => $request->quartier,
        ]);

        $player = Player::create([
            "poste" => $request->poste,
            "user_id" => $user->id,
            "team_id" => null,
        ]);

        $positionData = null;
        if ($request->poste === "GK") {
            $positionData = Goalkeeper::create([
                "diving" => $request->diving,
                "reflex" => $request->reflex,
                "handling" => $request->handling,
                "kicking" => $request->kicking,
                "positionning" => $request->positionning,
                "speed" => $request->speed,
                "player_id" => $player->id,
            ]);
        } else {
            $positionData = InsidePlayer::create([
                "pace" => $request->pace,
                "dribbling" => $request->dribbling,
                "shooting" => $request->shooting,
                "defending" => $request->defending,
                "passing" => $request->passing,
                "physical" => $request->physical,
                "player_id" => $player->id,
            ]);
        }

        Auth::login($user);

        return response()->json([
            "message" => "User created successfully",
            "user" => $user,
            "player" => $player,
            "position_data" => $positionData,
            "token" => $user->createToken('auth_token')->plainTextToken
        ], 201);
        
    }
}
