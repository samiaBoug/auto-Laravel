<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $article1 = Article::find(1);
        $tag1 = Tag::find(1);
        $tag2= Tag::find(2);
        $article1->tags()->attach($tag1->id) ;
        $article1->tags()->attach($tag2->id) ;

    }
}
