<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class CommentTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        // Enable detailed error messages
        $this->withoutExceptionHandling();

        // $this->withoutMiddleware();
        // Create and log in a user
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_can_create_comment()
    {
        // Create a post
        $post = Post::factory()->create();

        // Create comment data
        $commentData = [
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'comment' => 'This is a comment'
        ];

        // dd($commentData);

        // Send post request to create a comment
        $response = $this->post('/post/comment', $commentData);

        // Debugging response
        $response->dump();

        // Assert response status code is 201
        $response->assertStatus(201);
        
        // Additional assertions
        $this->assertDatabaseHas('comments', [
            // 'comment' => $commentData['comment'],
            'post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);
    }
}