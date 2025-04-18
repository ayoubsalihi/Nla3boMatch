<?php

namespace Database\Seeders\Competitions;

use App\Models\Competitions\Group;
use App\Models\Teams\Team;
use Database\Factories\Competitions\GroupFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::factory()->count(10)->create();
        $teams = Team::all();
        if ($teams->isEmpty()) {
            $teams = Team::factory()->count(20)->create();
        }
        $groups->each(function ($group) use ($teams) {
            $randomTeams = $teams->random(rand(4, 6));
            
            $pivotData = [];
            foreach ($randomTeams as $team) {
                $pivotData[$team->id] = [
                    'points' => rand(0, 9),
                    'GF' => rand(0, 9),
                    'GA' => rand(0, 9),
                    'GD' => rand(0, 9),
                ];
            }
            
            $group->teams()->attach($pivotData);
        });
    }
}
