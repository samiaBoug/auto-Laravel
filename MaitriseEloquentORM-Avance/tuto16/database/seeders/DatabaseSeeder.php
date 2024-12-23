<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
<<<<<<< HEAD
=======
        $this->call(UserAdminSeeder::class);
        $this->call(CategorySeed::class);
        $this->call(ArticleSeed::class);
        $this->call(ManagerUserSeeder::class);
        $this->call(TagSeed::class);
        $this->call(TagArticleSeed::class);
        $this->call(RolePermissionSeeder::class);

>>>>>>> fc253bc98103e8576d9bc07163ab1b8c6c1c221f

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
