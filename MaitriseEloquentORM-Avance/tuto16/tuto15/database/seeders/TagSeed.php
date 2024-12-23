<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tag::create(
            [
                'name' => 'tag1'
            ]
            );
        Tag::create(
            [
                'name' => 'tag2'
            ]
            );
    }
    
}
