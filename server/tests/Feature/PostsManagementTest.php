<?php

use App\Models\Posts\Post;
use App\Models\Posts\Video;

test("A video is on a post",function(){
    $post = Post::factory()->create();
    $video = Video::factory()->create([
        "post_id" => $post->id
    ]);

    expect($post->id)->toBe($video->post_id);
    expect($video->post->id)->toBe($video->post_id);

});
/**
 * The same for image so we don't need to test it
 * since we have a trait with the same method for both of them
 */