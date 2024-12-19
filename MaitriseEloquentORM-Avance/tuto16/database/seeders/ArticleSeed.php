<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Article::create([
            'title'=> 'titre',
            'content'=> 'contenue',
            'user_id' => 1,
            'category_id'=> 1
        ]);
    }
}
