<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlumniSeeder extends Seeder
{
    private function getAlumniPhoto(int $index): string
    {
        // Professional portrait photos from Unsplash for alumni
        $photos = [
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop', // Professional man 1
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop', // Professional woman 1
            'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop', // Professional man 2
            'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop', // Professional woman 2
            'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop', // Professional man 3
            'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&h=400&fit=crop', // Professional woman 3
            'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?w=400&h=400&fit=crop', // Professional man 4
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=400&fit=crop', // Professional woman 4
            'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&h=400&fit=crop', // Professional man 5
            'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop', // Professional woman 5
        ];

        return $photos[$index % count($photos)];
    }

    public function run(): void
    {
        $alumni = [
            [
                'name' => 'Reza Pratama',
                'angkatan' => '26',
                'current_job' => 'Tech Entrepreneur',
                'company' => 'Founder of StartupXYZ',
                'quote' => 'Semangat kewirausahaan yang ditanamkan di Moklet membuat saya berani memulai bisnis sendiri di usia muda.',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'angkatan' => '25',
                'current_job' => 'Software Engineer',
                'company' => 'Google Indonesia',
                'quote' => 'Pendidikan IT di Moklet memberikan fondasi yang kuat untuk karir saya di industri teknologi.',
            ],
            [
                'name' => 'Budi Santoso',
                'angkatan' => '24',
                'current_job' => 'Network Administrator',
                'company' => 'Telkom Indonesia',
                'quote' => 'Keterampilan jaringan yang saya pelajari di Moklet sangat berguna dalam pekerjaan saya sehari-hari.',
            ],
            [
                'name' => 'Dewi Kartika',
                'angkatan' => '26',
                'current_job' => 'UI/UX Designer',
                'company' => 'Tokopedia',
                'quote' => 'Moklet mengajarkan saya untuk selalu kreatif dan inovatif dalam setiap pekerjaan.',
            ],
            [
                'name' => 'Ahmad Fauzi',
                'angkatan' => '23',
                'current_job' => 'Data Scientist',
                'company' => 'Gojek',
                'quote' => 'Pembelajaran pemrograman di Moklet membuka jalan saya ke dunia data science.',
            ],
            [
                'name' => 'Rina Wijaya',
                'angkatan' => '25',
                'current_job' => 'Cloud Engineer',
                'company' => 'Amazon Web Services',
                'quote' => 'Guru-guru di Moklet selalu mendorong kami untuk terus belajar teknologi terbaru.',
            ],
            [
                'name' => 'Fajar Ramadhan',
                'angkatan' => '24',
                'current_job' => 'Cybersecurity Analyst',
                'company' => 'Bank Mandiri',
                'quote' => 'Pengetahuan keamanan siber yang saya dapatkan di Moklet sangat berharga di era digital ini.',
            ],
            [
                'name' => 'Maya Sari',
                'angkatan' => '26',
                'current_job' => 'Mobile Developer',
                'company' => 'Bukalapak',
                'quote' => 'Moklet tidak hanya mengajarkan coding, tapi juga problem solving yang baik.',
            ],
        ];

        // Add slug and photo to each alumni
        $data = array_map(function ($item, $index) {
            $item['slug'] = Str::slug($item['name']);
            $item['photo'] = $this->getAlumniPhoto($index);
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $alumni, array_keys($alumni));

        DB::table('alumnis')->insert($data);
    }
}
