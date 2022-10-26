<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'name' => 'TOR For UnderGrad (2 yr Course)',
            'amount' => '125',
        ]);

        Document::create([
            'name' => 'TOR For UnderGrad (4-5 Yr Degree) for Employment',
            'amount' => '175',
        ]);

        Document::create([
            'name' => 'TOR For UnderGrad (4-5 Yr Degree) for Board Exam',
            'amount' => '250',
        ]);

        Document::create([
            'name' => 'TOR For UnderGrad (4-5 Yr Degree) for Tansfer/Evaluation',
            'amount' => '300',
        ]);
        Document::create([
            'name' => 'TOR For Graduate School',
            'amount' => '50',
        ]);

        Document::create([
            'name' => 'Certification (Undergrad students)',
            'amount' => '20',
        ]);

        Document::create([
            'name' => 'Certification (Graduate School)',
            'amount' => '30',
        ]);

        Document::create([
            'name' => 'Certification of Weighted Average',
            'amount' => '30',
        ]);

        Document::create([
            'name' => 'CAV',
            'amount' => '50',
        ]);

        Document::create([
            'name' => 'Re-issuance of Diploma',
            'amount' => '250',
        ]);

        Document::create([
            'name' => 'Certificate of good moral',
            'amount' => '30',
        ]);

        Document::create([
            'name' => 'Plan of course work',
            'amount' => '30',
        ]);
    }
}
