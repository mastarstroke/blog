<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'tourism',
            'culture',
            'lifestyle',
            'food',
            'sport'
        ];
        
        foreach ($categories as $category) {
            Category::create([
                'title' => $category,
            ]);
        }
    }
}
