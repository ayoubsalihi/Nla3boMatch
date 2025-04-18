<?php

namespace Database\Seeders\Teams;

use App\Models\Competitions\Group;
use App\Models\Competitions\Partido;
use App\Models\Teams\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::all();
        if ($groups->isEmpty()) {
            $groups = Group::factory()->count(4)->create();
        }

        $partidos = Partido::all();
        if ($partidos->isEmpty()) {
            $partidos = Partido::factory()->count(30)->create();
        }
        
        $teams = Team::factory()->count(20)->create();
        $teams->each(function ($team) use ($groups) {
            $selectedGroups = $groups->random(rand(1, 2));
            
            $groupPivotData = [];
            foreach ($selectedGroups as $group) {
                $gf = rand(0, 10);
                $ga = rand(0, 8);
                $groupPivotData[$group->id] = [
                    'points' => rand(0, 30),
                    'GF' => $gf,
                    'GA' => $ga,
                    'GD' => $gf - $ga,
                ];
            }
            
            $team->groups()->attach($groupPivotData);
        });
        $partidos->each(function ($partido) use ($teams) {
            $selectedTeams = $teams->random(2);
            $partido->teams("partido_team")->attach($selectedTeams);
        });
    }
}
