<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        // Enable detailed error messages
        $this->withoutExceptionHandling();

        // Create and log in a user
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_can_create_post()
    {
        // Fake storage to test file uploads
        Storage::fake('public');

        // Create a category
        $category = Category::factory()->create();

        // Create post data
        $postData = [
            'title' => $this->faker->sentence,
            'desc' => $this->faker->paragraph,
            'category' => $category->title,
            'image' => UploadedFile::fake()->image('post.jpg'),
        ];

        // Send post request to create a post
        $response = $this->post('/store/post', $postData);

        // Debugging response
        $response->dump();

        // Assert response status code is 201
        $response->assertStatus(201);
        
        // Assert the post is in the database
        $this->assertDatabaseHas('posts', [
            'title' => $postData['title'],
            'desc' => $postData['desc'],
            'category' => $category->title,
        ]);

        // Assert the file was stored
        Storage::disk('public')->assertExists('images/posts/' . $postData['image']->hashName());
    }

    public function test_title_is_required()
    {
        // Create post data without title
        $postData = [
            'desc' => $this->faker->paragraph,
            'category' => Category::factory()->create()->title,
        ];

        // Send post request to create a post
        $response = $this->post('/store/post', $postData);

        // Assert response status code is 422 for validation error
        $response->assertStatus(422);

        // Assert the validation error message is present
        $response->assertJsonValidationErrors('title');
    }
}