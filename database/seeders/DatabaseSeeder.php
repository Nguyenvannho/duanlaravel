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
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            CustomerSeeder::class,
            GroupsSeeder::class,
            UserSeeder::class,
            GroupsSeeder::class,
            RoleSeeder::class,
            Group_RoleSeeder::class,
        
        ]);
    }
}
