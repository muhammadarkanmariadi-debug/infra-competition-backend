<?php

namespace Database\Seeders;

use App\Models\OrganizationRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrganizationRole::create([
            'role' => 'leader',
            'organization_id' => 1
        ]);
    }
}
