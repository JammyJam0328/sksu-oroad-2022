<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CampusAndProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campus = Campus::create([
            'name' => 'ACCESS Campus',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor of Physical Education (BPEd)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education (BEED)',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor in Secondary Education Major in English (BSEd-English)',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor in Secondary Education Major in Filipino (BSEd-Filipino)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Secondary Education Major in Science (BSEd-Science)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Secondary Education Major in Social Studies (BSEd-Social Studies)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Secondary Education Major in Mathematics (BSEd-Mathematics)',
        ]);
        $campus->programs()->create([
            'name' => 'Diploma in Teaching (DIT)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agricultural Technology (BAT)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Criminology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Nursing (BSN)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Midwifery (BSM)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Medical Technology',
        ]);
        $campus->programs()->create([
            'name' => 'Diploma in Midwifery',
        ]);
        $campus->programs()->create([
            'name' => 'Juris Doctor',
        ]);
        $user = User::create([
            'campus_id' => $campus->id,
            'name' => 'Access Campus',
            'password' => Hash::make('access12345'),
            'email' => 'accessreg@gmail.com',
        ]);

        $user->assignAsRegistrar();
        $user->assignAsAdmin();

        $campus = Campus::create([
            'name' => 'Isulan Campus',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor of Science in Civil Engineering (BSCE)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Computer Engineering (BSCpE)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Electronics Engineering (BSECE)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Computer Science (BSCS)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Information Technology (BSIT)',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor of Science in Information Systems (BSIS)',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Food Service Management',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Drafting Technology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Automotive Technology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Electrical Technology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Technical-Vocational Teacher Education (BTVTEd)  Major in Electronic Technology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Technical-Vocational Teacher Education (BTVTEd)   Major in Civil Technology',
        ]);
        $user = User::create([
            'campus_id' => $campus->id,

            'name' => 'Isulan Campus',
            'password' => Hash::make('isulan12345'),
            'email' => 'isulanreg@gmail.com',
        ]);

        $user->assignAsRegistrar();

        $campus = Campus::create([
            'name' => 'Tacurong Campus',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor of Arts in Economics',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Arts in Political Science',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Biology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Environmental Science',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Entrepreneurship',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Accountancy',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Management Accounting',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Hospitality Management',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Accounting Information System',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Tourism Management',
        ]);

        $user = User::create([
            'campus_id' => $campus->id,

            'name' => 'Tacurong Campus',
            'password' => Hash::make('tacurong12345'),
            'email' => 'tacurongreg@gmail.com',
        ]);

        $user->assignAsRegistrar();

        $campus = Campus::create([
            'name' => 'Kalamansig Campus',
        ]);

        $campus->programs()->create([
            'name' => 'Diploma in Teaching',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Secondary Education',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Biology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Fisheries',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor of Science in Criminology',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor of Science in Information Technology',
        ]);

        $user = User::create([
            'campus_id' => $campus->id,

            'name' => 'Kalamansig Campus',
            'password' => Hash::make('kalamansig12345'),
            'email' => 'kalamansigreg@gmail.com',
        ]);

        $user->assignAsRegistrar();

        $campus = Campus::create([
            'name' => 'Palimbang Campus',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education',
        ]);
        $user = User::create([
            'campus_id' => $campus->id,

            'name' => 'Palimbang Campus',
            'password' => Hash::make('palimbang12345'),
            'email' => 'palimbangreg@gmail.com',
        ]);

        $user->assignAsRegistrar();

        $campus = Campus::create([
            'name' => 'Bagumbayan Campus',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Technology and Livelihood Education major in Agri-fisheries',
        ]);
        $user = User::create([
            'campus_id' => $campus->id,

            'name' => 'Bagumbayan Campus',
            'password' => Hash::make('bagumbayan12345'),
            'email' => 'bagumbayanreg@gmail.com',
        ]);

        $user->assignAsRegistrar();

        $campus = Campus::create([
            'name' => 'Lutayan Campus',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor in Agricultural Technology',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agriculture',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education',
        ]);
        $user = User::create([
            'campus_id' => $campus->id,

            'name' => 'Lutayan Campus',
            'password' => Hash::make('lutayan12345'),
            'email' => 'lutayanreg@gmail.com',
        ]);

        $user->assignAsRegistrar();
    }
}
