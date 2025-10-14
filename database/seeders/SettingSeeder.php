<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'headmaster_id' => 2,
            'description' => 'description',
            'visi' => 'visi',
            'misi' => 'misi',
            'sambutan' => 'sambutan',
            'logo' => 'logo',
            'favicon' => 'favicon',
            'email' => 'email',
            'phone' => 'phone',
            'address' => 'address',
            'google_map' => 'google_map',
            'instagram' => 'instagram',
            'tiktok' => 'tiktok',
            'youtube' => 'youtube',
            'facebook' => 'facebook',
            

        ]);
    }
}
