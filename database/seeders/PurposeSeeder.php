<?php

namespace Database\Seeders;

use App\Models\Purpose;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purpose::create(['name' => 'For Licensure examination']);
        Purpose::create(['name' => 'For Transfer/evaluation']);
        Purpose::create(['name' => 'For Enrollment']);
        Purpose::create(['name' => 'For Employment']);
        Purpose::create(['name' => 'Promotion']);
        Purpose::create(['name' => 'Scholarship']);
        Purpose::create(['name' => 'Others']); // 7
    }
}
