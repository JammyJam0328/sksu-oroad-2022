<?php

namespace Database\Seeders;

use App\Models\StudentStatus;
use Illuminate\Database\Seeder;

class StudentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentStatus::create([
            'name' => 'Undergraduate',
        ]);
        StudentStatus::create([
            'name' => 'Graduate',
        ]);
        StudentStatus::create([
            'name' => 'Not Graduate',
        ]);
    }
}
