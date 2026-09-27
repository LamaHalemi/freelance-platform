<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web Development',
            'description' => 'Websites and web applications development.',
        ]);

        Category::create([
            'name' => 'Graphic Design',
            'description' => 'Logos, social media designs, and visual content.',
        ]);

        Category::create([
            'name' => 'Mobile Development',
            'description' => 'Android and iOS mobile applications development.',
        ]);

        Category::create([
            'name' => 'Digital Marketing',
            'description' => 'Marketing, advertising, and social media services.',
        ]);

        Category::create([
            'name' => 'Writing and Translation',
            'description' => 'Content writing, copywriting, and translation services.',
        ]);
    }
}
