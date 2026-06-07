<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Membuat 3 kategori artikel baru
        $categories = collect(['Teknologi', 'Gaya Hidup', 'Pendidikan'])->map(function ($name) {
            return Category::create(['name' => $name]);
        });

        // Membuat 30 artikel baru dengan kategori acak
        Article::factory(30)->make()->each(function ($article) use ($categories) {
            $article->category_id = $categories->random()->id;
            $article->save();

            // Menambahkan 10-20 komentar acak pada setiap artikel
            Comment::factory(rand(10, 20))->create([
                'article_id' => $article->id
            ]);
        });

    }
}
