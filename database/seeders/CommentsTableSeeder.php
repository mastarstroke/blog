<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $post = Post::all();

        foreach($post as $post){
            Comment::factory()->create([
                'user_id' => $users->random()->id,
                'post_id' => $post->id,
                'comment' => fake()->sentence()
            ]);
        }
    }
}