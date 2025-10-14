<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::create([
            'name' => 'Organization 1',
            'is_organization' => true,
            'mentor_id' => 1,
            'logo' => 'https://example.com/logo1.png',
            'description' => 'Description 1',
            'visi' => 'Visi 1',
            'misi' => 'Misi 1',
        ]);
    }
}
