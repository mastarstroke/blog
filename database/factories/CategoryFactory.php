<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CategoryFactory extends Factory
{
    use WithFaker;

    protected $model = Category::class;

    public function definition(): array
    {
        // Fake storage to test file uploads
        Storage::fake('public');

        return [
            'title' => $this->faker->sentence,
            'image' => UploadedFile::fake()->image('category.jpg'),
        ];
    }


}
