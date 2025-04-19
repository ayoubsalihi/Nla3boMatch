<?php

use App\Models\Users\Admin;
use App\Models\Users\User;

test("Admin is a user", function(){
    $user = User::factory()->create();
    $admin = Admin::factory()->create(
        [
            "user_id" => $user->id,
        ]
    );
    expect($admin->user->id)->toBe($admin->user_id);
});
