<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MajorSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel majors.
     */
    public function run(): void
    {
        $majors = [
            [
                'name' => 'Rekayasa Perangkat Lunak (RPL)',
                'thumbnail' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/code_uuifui',
                'long_description' => "Jurusan Rekayasa Perangkat Lunak (RPL) berfokus pada pengembangan perangkat lunak yang efisien, terstruktur, dan berkualitas tinggi. Siswa akan belajar bahasa pemrograman seperti Java, Python, PHP, dan JavaScript, serta mendalami konsep analisis sistem, desain antarmuka, pengujian perangkat lunak, dan pemeliharaan aplikasi. Dalam pembelajaran, siswa juga dikenalkan dengan metodologi Agile, penggunaan framework modern, serta pengelolaan proyek berbasis tim. Lulusan RPL memiliki kemampuan untuk bekerja sebagai software engineer, web developer, mobile app developer, system analyst, hingga UI/UX designer. Jurusan ini menanamkan kemampuan berpikir logis, kreatif, dan adaptif terhadap perkembangan teknologi industri 4.0.",
            ],
            [
                'name' => 'Teknik Komputer dan Jaringan (TKJ)',
                'thumbnail' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/network_cmv0cx',
                'long_description' => "Jurusan Teknik Komputer dan Jaringan (TKJ) adalah bidang yang mempelajari cara merancang, membangun, serta memelihara infrastruktur jaringan komputer. Siswa dibekali keterampilan dalam instalasi perangkat keras (hardware), konfigurasi router, switch, dan server, hingga keamanan jaringan (network security). Pembelajaran mencakup konsep TCP/IP, subnetting, virtualisasi, cloud computing, dan sistem operasi jaringan seperti Linux dan Windows Server. Selain itu, siswa juga memahami troubleshooting jaringan dan pemecahan masalah secara teknis. Lulusan TKJ siap bekerja di dunia IT sebagai network administrator, teknisi jaringan, IT support, hingga system engineer. Jurusan ini sangat relevan dengan kebutuhan industri digital yang mengandalkan konektivitas dan kecepatan komunikasi data.",
            ],
            [
                'name' => 'Pengembangan Game',
                'thumbnail' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/gim_hdjslq',
                'long_description' => "Jurusan Pengembangan Game berfokus pada pembuatan dan inovasi produk digital interaktif berupa permainan (game) yang menggabungkan kreativitas, seni, dan teknologi. Siswa akan mempelajari logika pemrograman, desain karakter, animasi, hingga penggunaan engine populer seperti Unity dan Unreal Engine. Tidak hanya menciptakan game untuk hiburan, siswa juga diajarkan mengembangkan game edukatif, simulasi, serta aplikasi berbasis gamifikasi. Jurusan ini melatih kemampuan berpikir kreatif, kerja tim lintas disiplin, serta problem solving yang tinggi. Lulusan jurusan ini mampu bekerja sebagai game developer, game designer, animator, technical artist, maupun game tester, dengan peluang luas di industri kreatif dan teknologi global yang terus berkembang.",

            ],
        ];

      
        foreach ($majors as $major) {
            $major['short_description'] = Str::limit($major['long_description'], 150);
        }

        Major::insert($majors);
    }
}
