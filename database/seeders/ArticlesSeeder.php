<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Новая статья 1',
            'content' => 'lorem ipsum',
            'image' => 'https://i.pinimg.com/736x/1b/e9/b3/1be9b318d70e2edcd9f14438efe4763a.jpg'
        ]);

        Article::create([
            'title' => 'Новая статья 2',
            'content' => 'Hello world!'
        ]);
    }
}
