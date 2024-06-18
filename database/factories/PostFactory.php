<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => 'this is title',
            'user_id' => '2',
            'category' => 'Culture',
            'desc' => 'Thi is a description',
            'trending' => 'yes',
        ];
    }


}
