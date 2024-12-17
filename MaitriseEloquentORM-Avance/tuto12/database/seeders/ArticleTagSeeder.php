<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag ;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $article = Article::find(1) ;
        $tag1 = Tag::find(1);
        $tag2 = Tag::find(2);


        $article->tag()->attach([$tag1->id , $tag2->id]);
    }
}
