<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Report::create([
            'title' => 'Laravel',
            'description' => 'Laravel is the best framework',
            'user_id' => 1,
        ]);

        Report::create([
            'title' => 'PHP',
            'description' => 'PHP is the best programming language',
            'user_id' => 2,
        ]);

        Report::create([
            'title' => 'Javascript',
            'description' => 'Javascript is the best programming language',
            'user_id' => 3,
        ]);
    }
}
