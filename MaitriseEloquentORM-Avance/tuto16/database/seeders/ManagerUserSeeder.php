<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(
            [
                'name' => 'manager',
                'email'=> 'manager@gmail.com',
                'password'=> 'password',
                'role' => 'manager'
            ]
            );
    }
}
