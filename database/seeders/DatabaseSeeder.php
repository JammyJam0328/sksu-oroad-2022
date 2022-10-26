<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StudentStatusSeeder::class,
            RoleSeeder::class,
            CampusAndProgramSeeder::class,
            DocumentSeeder::class,
            StatusSeeder::class,
            PurposeSeeder::class,
        ]);
    }
}
