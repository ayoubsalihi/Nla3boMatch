<?php

namespace Database\Seeders\Teams;

use App\Models\Competitions\Competition;
use App\Models\Competitions\Group;
use App\Models\Competitions\Partido;
use App\Models\Teams\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        $competitions = Competition::all();
        if ($competitions->isEmpty()) {
            $competitions = Competition::factory()->count(3)->create();
        }
        $teams = Team::factory()->count(20)->create();
        $competitions->each(function ($competition) use ($teams) {
            $teamsToAttach = $teams->random(rand(6, 10));
            $competition->teams("competition_team")->attach($teamsToAttach);
        });
        $groups = Group::all();
        if ($groups->isEmpty()) {
            $groups = Group::factory()->count(6)->create([
                'competition_id' => $competitions->random()->id
            ]);
        }

        $teams->each(function ($team) use ($groups) {
            $eligibleGroups = $groups->whereIn('competition_id', 
                $team->competitions->pluck('id')
            );
            
            if ($eligibleGroups->isNotEmpty()) {
                $gf = rand(0, 15);
                $ga = rand(0, 10);
                
                $team->groups()->attach(
                    $eligibleGroups->random()->id,
                    [
                        'points' => rand(0, 30),
                        'GF' => $gf,
                        'GA' => $ga,
                        'GD' => $gf - $ga
                    ]
                );
            }
        });
        $partidos = Partido::all();
        if ($partidos->isEmpty()) {
            $partidos = Partido::factory()->count(30)->create([
                'competition_id' => $competitions->random()->id
            ]);
        }

        $partidos->each(function ($partido) use ($teams) {
            $competitionTeams = $teams->filter(function ($team) use ($partido) {
                return $team->competitions->contains($partido->competition_id);
            });
            
            if ($competitionTeams->count() >= 2) {
                $selectedTeams = $competitionTeams->random(2);
                $partido->teams("partido_team");
            }
        });
    }
}