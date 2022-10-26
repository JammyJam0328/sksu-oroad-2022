<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin', //1
        ]);
        Role::create([
            'name' => 'Registrar', //2
        ]);
        Role::create([
            'name' => 'Requester', //3
        ]);
    }
}
