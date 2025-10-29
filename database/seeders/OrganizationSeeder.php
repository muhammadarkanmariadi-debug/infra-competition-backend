<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            [
                'name' => 'OSIS',
                'is_organization' => true,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/osis_qz1ec9',
                'long_description' => 'Organisasi Siswa Intra Sekolah (OSIS) SMK Telkom Malang merupakan wadah utama bagi peserta didik untuk mengembangkan potensi diri, menumbuhkan kepemimpinan, serta melatih tanggung jawab dan jiwa sosial. Sebagai organisasi resmi di bawah naungan sekolah, OSIS berperan penting dalam menyalurkan aspirasi siswa serta menjadi jembatan komunikasi antara peserta didik, guru, dan pihak sekolah.

Dengan semangat “Discipline, Responsibility, and Innovation”, OSIS SMK Telkom Malang berkomitmen untuk membentuk lingkungan sekolah yang aktif, kreatif, dan berprestasi. Melalui berbagai kegiatan seperti program bakti sosial, lomba akademik maupun non-akademik, pengembangan minat dan bakat, serta kegiatan kepemimpinan, OSIS tidak hanya menjadi pelaksana kegiatan sekolah, tetapi juga menjadi pelopor perubahan positif bagi seluruh warga sekolah.

OSIS SMK Telkom Malang terdiri dari berbagai bidang yang bekerja secara sinergis untuk mendukung visi dan misi sekolah. Setiap anggota diajarkan untuk bekerja dalam tim, berpikir kritis, serta mampu mengorganisir kegiatan dengan manajemen yang profesional. Nilai-nilai kedisiplinan, tanggung jawab, dan solidaritas menjadi dasar dalam setiap langkah dan keputusan organisasi.

Lebih dari sekadar organisasi, OSIS SMK Telkom Malang adalah ruang belajar kedua bagi para siswa untuk mengenal arti kepemimpinan, pelayanan, dan kontribusi nyata terhadap masyarakat sekolah. Dengan dukungan penuh dari pihak sekolah dan semangat juang seluruh anggotanya, OSIS berkomitmen untuk terus menjadi teladan serta inspirasi bagi seluruh siswa SMK Telkom Malang dalam mewujudkan generasi muda yang berkarakter, berintegritas, dan berdaya saing tinggi.',
                'visi' => 'Menjadi organisasi siswa yang berkarakter, inovatif, dan berintegritas tinggi dalam mewujudkan lingkungan sekolah yang unggul, disiplin, serta berprestasi.',
                'misi' => 'Menanamkan nilai-nilai kedisiplinan, tanggung jawab, dan kepemimpinan pada setiap anggota OSIS.
Mengembangkan kreativitas dan potensi siswa melalui kegiatan positif dan inovatif.
Menjadi wadah aspirasi siswa dalam membangun komunikasi yang harmonis antara peserta didik dan pihak sekolah.
Mengadakan kegiatan yang mendukung pengembangan akademik dan non-akademik secara berkelanjutan.

Menciptakan lingkungan sekolah yang aktif, beretika, serta menjunjung tinggi semangat kekeluargaan dan solidaritas.

Berperan aktif dalam kegiatan sosial dan kemasyarakatan sebagai bentuk pengabdian siswa kepada lingkungan sekitar.',
            ]
        ];

        foreach ($organizations as &$organization) {
            $organization['short_description'] = Str::limit($organization['long_description'], 150);
        }

        Organization::insert($organizations);
    }
}
