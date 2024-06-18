<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $category = Category::all();

        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 10; $i++) {
            $image = 'images'. rand(1, 13) . '.webp';

            // $storeImagePath = Storage::put($imagePath, file_get_contents(public_path('postimage')));

            Post::create([
                'title' => $faker->sentence,
                'desc' => $faker->paragraph,
                'user_id' => $users->random()->id,
                'category' => $category->random()->title,
                'image' => $image
            ]);
        }
    }
}
