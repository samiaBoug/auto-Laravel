<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Video::create(
            [
                'title' => 'titre de video',
                'description' => 'descriptionde video',
                'user_id' => 1 ,
                'category_id'=> 1
            ]
            );
    }
}
