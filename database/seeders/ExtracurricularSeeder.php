<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtracurricularSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ekstrakulikulers')->insert([
            [
                'name' => 'Pramuka',
                'description' => 'Gerakan kepanduan yang membentuk karakter dan jiwa kepemimpinan.',
                'logo' => 'https://images.unsplash.com/photo-1568120335123-14e49e7f3a2a?auto=format&fit=crop&w=600&q=60', // anak pramuka di alam
            ],
            [
                'name' => 'Bola Voli',
                'description' => 'Olahraga bola voli untuk melatih kerjasama tim dan fisik.',
                'logo' => 'https://images.unsplash.com/photo-1504544750208-dc0358e63f7f?auto=format&fit=crop&w=600&q=60', // bola voli di lapangan
            ],
            [
                'name' => 'Seni Tari',
                'description' => 'Mengembangkan bakat menari dan ekspresi seni gerak.',
                'logo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=600&q=60', // penari
            ],
            [
                'name' => 'Seni Vokal',
                'description' => 'Pengembangan bakat menyanyi dan seni suara.',
                'logo' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=600&q=60', // mikrofon
            ],
            [
                'name' => 'Teater',
                'description' => 'Mengasah kemampuan akting, drama, dan ekspresi panggung.',
                'logo' => 'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=crop&w=600&q=60', // aktor di panggung
            ],
            [
                'name' => 'Karawitan',
                'description' => 'Belajar seni musik tradisional Jawa dan gamelan.',
                'logo' => 'https://images.unsplash.com/photo-1588422333077-64f2a7b50b17?auto=format&fit=crop&w=600&q=60', // gamelan tradisional
            ],
            [
                'name' => 'PMR',
                'description' => 'Pelatihan pertolongan pertama dan kepedulian sosial.',
                'logo' => 'https://images.unsplash.com/photo-1606813909973-6dfae5f7cbb8?auto=format&fit=crop&w=600&q=60', // palang merah
            ],
            [
                'name' => 'Fotografi',
                'description' => 'Belajar teknik fotografi dan pengambilan gambar.',
                'logo' => 'https://images.unsplash.com/photo-1519183071298-a2962be96c83?auto=format&fit=crop&w=600&q=60', // kamera DSLR
            ],
            [
                'name' => 'Paskibra',
                'description' => 'Melatih disiplin, kepemimpinan, dan kebanggaan nasional.',
                'logo' => 'https://images.unsplash.com/photo-1590782306387-4cf2c8ff7d36?auto=format&fit=crop&w=600&q=60', // bendera merah putih
            ],
            [
                'name' => 'Pencak Silat',
                'description' => 'Belajar seni bela diri tradisional Indonesia.',
                'logo' => 'https://images.unsplash.com/photo-1604964432806-254d63f88b13?auto=format&fit=crop&w=600&q=60', // pencak silat
            ],
            [
                'name' => 'Bola Basket',
                'description' => 'Melatih kerjasama dan kebugaran melalui olahraga basket.',
                'logo' => 'https://images.unsplash.com/photo-1521412644187-c49fa049e84d?auto=format&fit=crop&w=600&q=60', // bola basket
            ],
            [
                'name' => 'Futsal',
                'description' => 'Melatih teamwork dan ketangkasan dalam olahraga futsal.',
                'logo' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=600&q=60', // lapangan futsal
            ],
            [
                'name' => 'English Conversation',
                'description' => 'Belajar dan praktik percakapan bahasa Inggris.',
                'logo' => 'https://images.unsplash.com/photo-1584697964154-ef25b8b49b7c?auto=format&fit=crop&w=600&q=60', // belajar bahasa
            ],
            [
                'name' => 'Robotik',
                'description' => 'Belajar merakit dan memprogram robot.',
                'logo' => 'https://images.unsplash.com/photo-1581092334569-7b8bfa42a244?auto=format&fit=crop&w=600&q=60', // robot
            ],
            [
                'name' => 'Graphic Design',
                'description' => 'Belajar desain grafis dan kreativitas visual.',
                'logo' => 'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=600&q=60', // desain grafis
            ],
            [
                'name' => 'Cloud Computing',
                'description' => 'Belajar teknologi komputasi awan dan server modern.',
                'logo' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=600&q=60', // awan / server
            ],
            [
                'name' => 'IT Software',
                'description' => 'Belajar pengembangan perangkat lunak dan aplikasi.',
                'logo' => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&w=600&q=60', // coding
            ],
            [
                'name' => 'Artificial Intelligence',
                'description' => 'Belajar dasar-dasar kecerdasan buatan dan machine learning.',
                'logo' => 'https://images.unsplash.com/photo-1581092588429-0f62bdc13c1d?auto=format&fit=crop&w=600&q=60', // AI robot
            ],
            [
                'name' => 'Cyber Security',
                'description' => 'Belajar keamanan siber dan perlindungan data.',
                'logo' => 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=600&q=60', // keamanan digital
            ],
            [
                'name' => 'Drone Pilot',
                'description' => 'Belajar mengoperasikan dan mengendalikan drone.',
                'logo' => 'https://images.unsplash.com/photo-1508610048659-a06b669e3321?auto=format&fit=crop&w=600&q=60', // drone
            ],
            [
                'name' => 'Internet Network Cabling',
                'description' => 'Belajar instalasi dan manajemen kabel jaringan internet.',
                'logo' => 'https://images.unsplash.com/photo-1605810230434-7631ac76ec81?auto=format&fit=crop&w=600&q=60', // kabel jaringan
            ],
            [
                'name' => 'IT Network',
                'description' => 'Belajar membangun dan mengelola jaringan komputer.',
                'logo' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=600&q=60', // server rack
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Belajar strategi pemasaran digital dan media sosial.',
                'logo' => 'https://images.unsplash.com/photo-1557838923-2985c318be48?auto=format&fit=crop&w=600&q=60', // marketing online
            ],
            [
                'name' => 'Web Design',
                'description' => 'Belajar desain dan pengembangan website.',
                'logo' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&q=60', // UI design
            ],
        ]);
    }
}
