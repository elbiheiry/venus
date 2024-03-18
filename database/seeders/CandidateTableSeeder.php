<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            Candidate::create([
                'name' => Str::random(16),
                'email' => 'email#'.$i.'@venus.com',
                'phone' => rand(1000 , 9999),
                'department' => 'department#'.$i,
                'cv' => 'cv.jpg'
            ]);
        }
    }
}
