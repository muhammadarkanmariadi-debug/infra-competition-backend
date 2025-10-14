<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'name' => 'Class 1',
            'major_id' => 1,
            'generation_id' => 1,
            'grade_id' => 1,
            'expertise_id' => 1,
            'homeroomTeacher_id' => 1
            
        ]);
    }
}
