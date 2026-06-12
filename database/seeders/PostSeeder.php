<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(5)->create();

        Post::factory()
            ->count(10)
            ->make()
            ->each(function ($post) use ($categories) {
                $post->category_id = $categories->random()->id;
                $post->save();
            });
    }
}
