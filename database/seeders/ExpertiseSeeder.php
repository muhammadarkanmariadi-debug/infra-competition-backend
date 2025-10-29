<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expertise;

class ExpertiseSeeder extends Seeder
{
    public function run(): void
    {
        $expertises = [
            // === RPL ===
            [
                'name' => 'Front End Development',
                'major_id' => 1,
                'description' => 'Berfokus pada pembuatan tampilan antarmuka pengguna menggunakan teknologi seperti HTML, CSS, JavaScript, dan framework modern seperti React atau Vue.js.'
            ],
            [
                'name' => 'Back End Development',
                'major_id' => 1,
                'description' => 'Menangani logika server, basis data, dan API menggunakan bahasa seperti PHP, Node.js, Python, atau Java.'
            ],
            [
                'name' => 'Fullstack Development',
                'major_id' => 1,
                'description' => 'Menggabungkan kemampuan front end dan back end untuk mengembangkan aplikasi web secara menyeluruh dan efisien.'
            ],
            [
                'name' => 'UI/UX Design',
                'major_id' => 1,
                'description' => 'Merancang pengalaman pengguna dan antarmuka visual yang menarik, fungsional, dan mudah digunakan.'
            ],

            // === TKJ ===
            [
                'name' => 'Cloud Computing',
                'major_id' => 2,
                'description' => 'Mempelajari penerapan teknologi komputasi awan seperti AWS, Google Cloud, dan Azure untuk infrastruktur modern dan efisien.'
            ],
            [
                'name' => 'IT Network Cabling',
                'major_id' => 2,
                'description' => 'Berfokus pada instalasi, konfigurasi, dan pemeliharaan jaringan kabel serta perangkat keras jaringan.'
            ],

            // === PG (Pengembangan Game) ===
            [
                'name' => '3D Art Designer',
                'major_id' => 3,
                'description' => 'Mendesain model, karakter, lingkungan, dan aset 3D menggunakan software seperti Blender, Maya, atau 3ds Max untuk kebutuhan pengembangan game.'
            ],
            [
                'name' => 'Game Programmer',
                'major_id' => 3,
                'description' => 'Mengembangkan logika permainan, sistem interaksi, dan mekanika gameplay menggunakan bahasa pemrograman seperti C#, C++, atau Unity Script.'
            ],
        ];

        foreach ($expertises as $expertise) {
            Expertise::create($expertise);
        }
    }
}
