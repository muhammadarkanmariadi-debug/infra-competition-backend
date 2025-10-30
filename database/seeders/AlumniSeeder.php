<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        $alumni = [
            [
                'name' => 'Reza Pratama',
                'photo' => '/assets/image/alumni/alif.png',
                'angkatan' => '26',
                'current_job' => 'Tech Entrepreneur',
                'company' => 'Founder of StartupXYZ',
                'quote' => 'Semangat kewirausahaan yang ditanamkan di Moklet membuat saya berani memulai bisnis sendiri di usia muda.',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'photo' => '/assets/image/alumni/siti.png',
                'angkatan' => '25',
                'current_job' => 'Software Engineer',
                'company' => 'Google Indonesia',
                'quote' => 'Pendidikan IT di Moklet memberikan fondasi yang kuat untuk karir saya di industri teknologi.',
            ],
            [
                'name' => 'Budi Santoso',
                'photo' => '/assets/image/alumni/budi.png',
                'angkatan' => '24',
                'current_job' => 'Network Administrator',
                'company' => 'Telkom Indonesia',
                'quote' => 'Keterampilan jaringan yang saya pelajari di Moklet sangat berguna dalam pekerjaan saya sehari-hari.',
            ],
            [
                'name' => 'Dewi Kartika',
                'photo' => '/assets/image/alumni/dewi.png',
                'angkatan' => '26',
                'current_job' => 'UI/UX Designer',
                'company' => 'Tokopedia',
                'quote' => 'Moklet mengajarkan saya untuk selalu kreatif dan inovatif dalam setiap pekerjaan.',
            ],
            [
                'name' => 'Ahmad Fauzi',
                'photo' => '/assets/image/alumni/ahmad.png',
                'angkatan' => '23',
                'current_job' => 'Data Scientist',
                'company' => 'Gojek',
                'quote' => 'Pembelajaran pemrograman di Moklet membuka jalan saya ke dunia data science.',
            ],
            [
                'name' => 'Rina Wijaya',
                'photo' => '/assets/image/alumni/rina.png',
                'angkatan' => '25',
                'current_job' => 'Cloud Engineer',
                'company' => 'Amazon Web Services',
                'quote' => 'Guru-guru di Moklet selalu mendorong kami untuk terus belajar teknologi terbaru.',
            ],
            [
                'name' => 'Fajar Ramadhan',
                'photo' => '/assets/image/alumni/fajar.png',
                'angkatan' => '24',
                'current_job' => 'Cybersecurity Analyst',
                'company' => 'Bank Mandiri',
                'quote' => 'Pengetahuan keamanan siber yang saya dapatkan di Moklet sangat berharga di era digital ini.',
            ],
            [
                'name' => 'Maya Sari',
                'photo' => '/assets/image/alumni/maya.png',
                'angkatan' => '26',
                'current_job' => 'Mobile Developer',
                'company' => 'Bukalapak',
                'quote' => 'Moklet tidak hanya mengajarkan coding, tapi juga problem solving yang baik.',
            ],
        ];

        // Add slug to each alumni
        $data = array_map(function ($item) {
            $item['slug'] = Str::slug($item['name']);
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $alumni);

        DB::table('alumnis')->insert($data);
    }
}
