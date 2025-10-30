<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtracurricularSeeder extends Seeder
{
    private function getEkskulImage(string $name): string
    {
        $nameLower = strtolower($name);

        if (str_contains($nameLower, 'musik') || str_contains($nameLower, 'band') || str_contains($nameLower, 'vokal')) {
            return 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=400&h=400&fit=crop'; // Band/Music
        } elseif (str_contains($nameLower, 'seni') || str_contains($nameLower, 'art') || str_contains($nameLower, 'lukis')) {
            return 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?w=400&h=400&fit=crop'; // Art
        } elseif (str_contains($nameLower, 'basket')) {
            return 'https://images.unsplash.com/photo-1546519638-68e109498ffc?w=400&h=400&fit=crop'; // Basketball
        } elseif (str_contains($nameLower, 'futsal') || str_contains($nameLower, 'sepak')) {
            return 'https://images.unsplash.com/photo-1553778263-73a83bab9b0c?w=400&h=400&fit=crop'; // Soccer/Futsal
        } elseif (str_contains($nameLower, 'voli') || str_contains($nameLower, 'volley')) {
            return 'https://images.unsplash.com/photo-1612872087720-bb876e2e67d1?w=400&h=400&fit=crop'; // Volleyball
        } elseif (str_contains($nameLower, 'badminton') || str_contains($nameLower, 'bulutangkis')) {
            return 'https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?w=400&h=400&fit=crop'; // Badminton
        } elseif (str_contains($nameLower, 'tari') || str_contains($nameLower, 'dance')) {
            return 'https://images.unsplash.com/photo-1508700929628-666bc8bd84ea?w=400&h=400&fit=crop'; // Dance
        } elseif (str_contains($nameLower, 'pmr') || str_contains($nameLower, 'kesehatan') || str_contains($nameLower, 'palang')) {
            return 'https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=400&h=400&fit=crop'; // Medical/PMR
        } elseif (str_contains($nameLower, 'pramuka') || str_contains($nameLower, 'scout')) {
            return 'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?w=400&h=400&fit=crop'; // Scout/Nature
        } elseif (str_contains($nameLower, 'foto') || str_contains($nameLower, 'kamera') || str_contains($nameLower, 'photography')) {
            return 'https://images.unsplash.com/photo-1452587925148-ce544e77e70d?w=400&h=400&fit=crop'; // Photography
        } elseif (str_contains($nameLower, 'bahasa') || str_contains($nameLower, 'english') || str_contains($nameLower, 'conversation')) {
            return 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=400&h=400&fit=crop'; // Language/Books
        } elseif (str_contains($nameLower, 'coding') || str_contains($nameLower, 'programming') || str_contains($nameLower, 'komputer') || str_contains($nameLower, 'software')) {
            return 'https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=400&h=400&fit=crop'; // Coding
        } elseif (str_contains($nameLower, 'literasi') || str_contains($nameLower, 'baca') || str_contains($nameLower, 'buku')) {
            return 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=400&h=400&fit=crop'; // Reading/Books
        } elseif (str_contains($nameLower, 'teater') || str_contains($nameLower, 'drama')) {
            return 'https://images.unsplash.com/photo-1503095396549-807759245b35?w=400&h=400&fit=crop'; // Theater
        } elseif (str_contains($nameLower, 'jurnalis') || str_contains($nameLower, 'news') || str_contains($nameLower, 'media')) {
            return 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=400&h=400&fit=crop'; // Journalism
        } elseif (str_contains($nameLower, 'robotik') || str_contains($nameLower, 'robot')) {
            return 'https://images.unsplash.com/photo-1563207153-f403bf289096?w=400&h=400&fit=crop'; // Robotics
        } elseif (str_contains($nameLower, 'pecinta alam') || str_contains($nameLower, 'alam')) {
            return 'https://images.unsplash.com/photo-1551632811-561732d1e306?w=400&h=400&fit=crop'; // Nature
        } elseif (str_contains($nameLower, 'desain') || str_contains($nameLower, 'design')) {
            return 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&h=400&fit=crop'; // Design
        } elseif (str_contains($nameLower, 'organisasi') || str_contains($nameLower, 'osis') || str_contains($nameLower, 'mpk')) {
            return 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=400&h=400&fit=crop'; // Organization/Team
        } else {
            return 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=400&h=400&fit=crop'; // Default student activity
        }
    }

    public function run(): void
    {
        $extracurriculars = [
            [
                'name' => 'Pramuka',
                'description' => 'Gerakan kepanduan yang membentuk karakter dan jiwa kepemimpinan.',
            ],
            [
                'name' => 'Bola Voli',
                'description' => 'Olahraga bola voli untuk melatih kerjasama tim dan fisik.',
            ],
            [
                'name' => 'Seni Tari',
                'description' => 'Mengembangkan bakat menari dan ekspresi seni gerak.',
            ],
            [
                'name' => 'Seni Vokal',
                'description' => 'Pengembangan bakat menyanyi dan seni suara.',
            ],
            [
                'name' => 'Teater',
                'description' => 'Mengasah kemampuan akting, drama, dan ekspresi panggung.',
            ],
            [
                'name' => 'Karawitan',
                'description' => 'Belajar seni musik tradisional Jawa dan gamelan.',
            ],
            [
                'name' => 'PMR',
                'description' => 'Pelatihan pertolongan pertama dan kepedulian sosial.',
            ],
            [
                'name' => 'Fotografi',
                'description' => 'Belajar teknik fotografi dan pengambilan gambar.',
            ],
            [
                'name' => 'Paskibra',
                'description' => 'Melatih disiplin, kepemimpinan, dan kebanggaan nasional.',
            ],
            [
                'name' => 'Pencak Silat',
                'description' => 'Belajar seni bela diri tradisional Indonesia.',
            ],
            [
                'name' => 'Bola Basket',
                'description' => 'Melatih kerjasama dan kebugaran melalui olahraga basket.',
            ],
            [
                'name' => 'Futsal',
                'description' => 'Melatih teamwork dan ketangkasan dalam olahraga futsal.',
            ],
            [
                'name' => 'English Conversation',
                'description' => 'Belajar dan praktik percakapan bahasa Inggris.',
            ],
            [
                'name' => 'Robotik',
                'description' => 'Belajar merakit dan memprogram robot.',
            ],
            [
                'name' => 'Graphic Design',
                'description' => 'Belajar desain grafis dan kreativitas visual.',
            ],
            [
                'name' => 'Cloud Computing',
                'description' => 'Belajar teknologi komputasi awan dan server modern.',
            ],
            [
                'name' => 'IT Software',
                'description' => 'Belajar pengembangan perangkat lunak dan aplikasi.',
            ],
            [
                'name' => 'Artificial Intelligence',
                'description' => 'Belajar dasar-dasar kecerdasan buatan dan machine learning.',
            ],
            [
                'name' => 'Cyber Security',
                'description' => 'Belajar keamanan siber dan perlindungan data.',
            ],
            [
                'name' => 'Drone Pilot',
                'description' => 'Belajar mengoperasikan dan mengendalikan drone.',
            ],
            [
                'name' => 'Internet Network Cabling',
                'description' => 'Belajar instalasi dan manajemen kabel jaringan internet.',
            ],
            [
                'name' => 'IT Network',
                'description' => 'Belajar membangun dan mengelola jaringan komputer.',
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Belajar strategi pemasaran digital dan media sosial.',
            ],
            [
                'name' => 'Web Design',
                'description' => 'Belajar desain dan pengembangan website.',
            ],
        ];

        // Add logo to each extracurricular based on name
        $data = array_map(function ($item) {
            $item['logo'] = $this->getEkskulImage($item['name']);
            return $item;
        }, $extracurriculars);

        DB::table('ekstrakulikulers')->insert($data);
    }
}
