<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Eunizel Gabas',
        //     'email' => 'eun@gmail.com',
        //     'password' => bcrypt('password123')
        // ]);

        $this->call([
            EmployeeSeeder::class,
            ExpenseSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
        ]);

    }
}
