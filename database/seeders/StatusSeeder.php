<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Pending', //1
        ]);
        Status::create([
            'name' => 'Approved | For Payment', //2
        ]);
        Status::create([
            'name' => 'Request Denied', //3
        ]);
        Status::create([
            'name' => 'Payment Submitted', //4
        ]);
        Status::create([
            'name' => 'Payment Approved | For Release', //5
        ]);
        Status::create([
            'name' => 'Payment Denied', //6
        ]);
        Status::create([
            'name' => 'Released', //7
        ]);
        Status::create([
            'name' => 'Clearance Validation', //8
        ]);
    }
}
