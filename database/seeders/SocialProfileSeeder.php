<?php

namespace Database\Seeders;

use App\Models\SocialProfile;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialProfile::create([
            'user_id' => 2,
            'description' => 'description',
            'profile_photo' => 'https://tse2.mm.bing.net/th/id/OIP.8FDD1Rqwz3cxUfsnnLrQ3gHaEK?pid=Api&P=0&h=180',
            'organization_id' => 1,
            'class_id' => 1,
            'organization_role_id' => 1,
            'position' => 'leader',
            'subject_id' => 1,
            'unit_id' => 1
        ]);
    }
}
