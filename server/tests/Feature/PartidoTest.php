<?php

use App\Models\Competitions\Competition;
use App\Models\Competitions\Partido;
use App\Models\Posts\Post;
use App\Models\Teams\Team;
use App\Models\Terrains\Terrain;

test("a match has Team1 as first team",function(){
    $team1 = Team::factory()->create();
    $partido = Partido::factory()->create([
        "team1_id" => $team1->id,
    ]);

    expect($partido->team1->id)->toBe($partido->team1_id);
});

test("a match has Team2 as second team",function(){
    $team2 = Team::factory()->create();
    $partido = Partido::factory()->create([
        "team2_id" => $team2->id,
    ]);

    expect($partido->team2->id)->toBe($partido->team2_id);
});

test("a match is belongs to a terrain",function(){
    $terrain = Terrain::factory()->create();
    $partido = Partido::factory()->create([
        "terrain_id" => $terrain->id
    ]);

    expect($partido->terrain->id)->toBe($partido->terrain_id);
});

test("a partido have many post",function(){
    $partido = Partido::factory()->create();
    $post = Post::factory()->count(3)->create();
    $partido->posts()->saveMany($post);
    expect($partido->posts()->count())->toBe(3);

});

/**
 * This test take charge of scope group and knockouts
 */
test("a partido can be a knockout match", function () {
    $knockoutMatch = Partido::factory()->create([
        'round' => '1/4',
    ]);
    $groupMatch = Partido::factory()->create([
        'round' => 'group_stage',
    ]);
    $partido = Partido::factory()->create();
    $knockoutMatches = Partido::knockouts()->get();
    expect($knockoutMatches->pluck('id'))->toContain($knockoutMatch->id);
    expect($knockoutMatches->pluck('id'))->not->toContain($groupMatch->id);
});


    test("get all the knockout matches for a specific competition", function () {
        $competition = Competition::factory()->create();
        $otherCompetition = Competition::factory()->create();

        $knockoutMatch1 = Partido::factory()->create([
            'round' => '1/4',
            'competition_id' => $competition->id,
        ]);
        $knockoutMatch2 = Partido::factory()->create([
            'round' => 'semi_final',
            'competition_id' => $competition->id,
        ]);
        $groupMatch = Partido::factory()->create([
            'round' => 'group_stage',
            'competition_id' => $competition->id,
        ]);
        $otherCompetitionMatch = Partido::factory()->create([
            'round' => '1/4',
            'competition_id' => $otherCompetition->id,
        ]);

        $knockoutMatches = Partido::getKnockoutMatches(Partido::query(), $competition->id);

        expect($knockoutMatches->pluck('id'))->toContain($knockoutMatch1->id);
        expect($knockoutMatches->pluck('id'))->toContain($knockoutMatch2->id);
        expect($knockoutMatches->pluck('id'))->not->toContain($groupMatch->id);
        expect($knockoutMatches->pluck('id'))->not->toContain($otherCompetitionMatch->id);
    });



it("brings all matches by stage", function () {
    $competition = Competition::factory()->create();
    $otherCompetition = Competition::factory()->create();

    $groupMatch1 = Partido::factory()->create([
        'round' => 'group_stage',
        'competition_id' => $competition->id,
    ]);
    $groupMatch2 = Partido::factory()->create([
        'round' => 'group_stage',
        'competition_id' => $competition->id,
    ]);
    $knockoutMatch = Partido::factory()->create([
        'round' => '1/4',
        'competition_id' => $competition->id,
    ]);
    $otherCompetitionMatch = Partido::factory()->create([
        'round' => 'group_stage',
        'competition_id' => $otherCompetition->id,
    ]);

$groupMatches = Partido::getMatchesByStage(Partido::query(), $competition->id, 'group_stage');

expect($groupMatches->pluck('id'))->toContain($groupMatch1->id);
expect($groupMatches->pluck('id'))->toContain($groupMatch2->id);
expect($groupMatches->pluck('id'))->not->toContain($knockoutMatch->id);
expect($groupMatches->pluck('id'))->not->toContain($otherCompetitionMatch->id);
});
