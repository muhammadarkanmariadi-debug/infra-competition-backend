<?php

namespace Database\Seeders;

use App\Models\Expertise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expertise::create([
            'name' => 'Expertise 1',
            'major_id' => 1,
            'description' => 'Description for Expertise 1',
        ]);
    }
}
