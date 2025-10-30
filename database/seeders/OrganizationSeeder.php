<?php

namespace Database\Seeders;

use App\Models\Organization;
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
            // === ORGANISASI UTAMA ===
            [
                'name' => 'OSIS',
                'is_organization' => true,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/osis_qz1ec9',
                'long_description' => '
                    <p><strong>Organisasi Siswa Intra Sekolah (OSIS)</strong> merupakan wadah utama bagi peserta didik untuk mengembangkan potensi diri, menumbuhkan kepemimpinan, serta melatih tanggung jawab dan jiwa sosial di SMK Telkom Malang.</p>
                ',
                'visi' => '<p>Menjadi organisasi siswa yang berkarakter, inovatif, dan berintegritas tinggi.</p>',
                'misi' => '<ul><li>Menanamkan nilai disiplin dan tanggung jawab.</li><li>Mengembangkan kreativitas dan potensi siswa.</li><li>Menjadi wadah aspirasi siswa.</li></ul>',
            ],
            [
                'name' => 'MPK',
                'is_organization' => true,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/mpk_dvx9zl',
                'long_description' => '
                    <p><strong>Majelis Permusyawaratan Kelas (MPK)</strong> merupakan lembaga legislatif siswa yang berfungsi sebagai pengawas dan penyalur aspirasi antar kelas, serta mitra OSIS dalam mewujudkan tata kelola organisasi yang demokratis.</p>
                ',
                'visi' => '<p>Menjadi lembaga siswa yang demokratis, aspiratif, dan bertanggung jawab.</p>',
                'misi' => '<ul><li>Mengawasi pelaksanaan program OSIS.</li><li>Menampung dan menyalurkan aspirasi siswa.</li><li>Menegakkan peraturan dan etika organisasi.</li></ul>',
            ],

            // === SUB ORGANISASI ===
            [
                'name' => 'METIC',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/metic_x7nhga',
                'long_description' => '<p>METIC (Moklet Education and Technology Innovation Club) adalah komunitas pelajar SMK Telkom Malang yang berfokus pada inovasi teknologi, pemrograman, dan pengembangan karya digital berbasis IT.</p>',
                'visi' => '<p>Menjadi komunitas pelajar teknologi yang kreatif dan solutif.</p>',
                'misi' => '<ul><li>Meningkatkan kemampuan di bidang teknologi dan inovasi.</li><li>Mendorong siswa untuk berprestasi di bidang IT.</li></ul>',
            ],
            [
                'name' => 'MEMO',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/memo_x9czvb',
                'long_description' => '<p>MEMO (Media dan Komunikasi) adalah komunitas kreatif yang berfokus pada publikasi, dokumentasi, dan komunikasi digital di lingkungan sekolah.</p>',
                'visi' => '<p>Menjadi pusat media kreatif dan informatif sekolah.</p>',
                'misi' => '<ul><li>Mengelola publikasi informasi sekolah.</li><li>Meningkatkan keterampilan komunikasi dan desain media.</li></ul>',
            ],
            [
                'name' => 'MAC',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/mac_kjhrzb',
                'long_description' => '<p>Moklet Art Community (MAC) adalah wadah ekspresi seni siswa SMK Telkom Malang, mencakup seni musik, tari, teater, dan visual.</p>',
                'visi' => '<p>Menumbuhkan dan menyalurkan bakat seni siswa.</p>',
                'misi' => '<ul><li>Mengembangkan kreativitas seni siswa.</li><li>Mengadakan pertunjukan dan pameran seni.</li></ul>',
            ],
            [
                'name' => 'COMET',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/comet_gcpuzf',
                'long_description' => '<p>Community of Moklet English Talent (COMET) merupakan komunitas yang berfokus pada pengembangan kemampuan bahasa Inggris siswa melalui kegiatan interaktif dan kompetisi.</p>',
                'visi' => '<p>Mengasah kemampuan berbahasa Inggris siswa secara komunikatif dan kompetitif.</p>',
                'misi' => '<ul><li>Meningkatkan kemampuan speaking dan writing siswa.</li><li>Mendorong partisipasi dalam lomba bahasa Inggris.</li></ul>',
            ],
            [
                'name' => 'PUSTEL',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/pustel_hvbrcb',
                'long_description' => '<p>PUSTEL (Perpustakaan Telkom) adalah komunitas literasi yang mengelola kegiatan perpustakaan serta mengembangkan budaya membaca di lingkungan sekolah.</p>',
                'visi' => '<p>Meningkatkan minat baca dan literasi digital di kalangan siswa.</p>',
                'misi' => '<ul><li>Mengelola koleksi buku sekolah.</li><li>Mengadakan kegiatan literasi rutin.</li></ul>',
            ],
            [
                'name' => 'PMR',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/pmr_yvlhxt',
                'long_description' => '<p>Palang Merah Remaja (PMR) adalah organisasi sosial yang menanamkan nilai kemanusiaan dan kepedulian terhadap sesama di lingkungan sekolah.</p>',
                'visi' => '<p>Mewujudkan generasi muda yang sehat, peduli, dan berjiwa kemanusiaan.</p>',
                'misi' => '<ul><li>Mengadakan pelatihan pertolongan pertama.</li><li>Berpartisipasi dalam kegiatan sosial dan donor darah.</li></ul>',
            ],
            [
                'name' => 'PALWAGA',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/palwaga_mqubty',
                'long_description' => '<p>Pasukan Pengibar Bendera (PALWAGA) merupakan tim kebanggaan sekolah yang bertugas dalam upacara dan pelatihan kedisiplinan.</p>',
                'visi' => '<p>Menjadi simbol kedisiplinan dan kehormatan sekolah.</p>',
                'misi' => '<ul><li>Menegakkan semangat nasionalisme.</li><li>Melatih kedisiplinan dan tanggung jawab siswa.</li></ul>',
            ],
            [
                'name' => 'BDI',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/bdi_sfd2nx',
                'long_description' => '<p>Badan Dakwah Islam (BDI) adalah organisasi keagamaan siswa yang berfokus pada pengembangan spiritualitas dan nilai-nilai keislaman di sekolah.</p>',
                'visi' => '<p>Menumbuhkan generasi Islami yang berakhlak dan berilmu.</p>',
                'misi' => '<ul><li>Meningkatkan kegiatan keagamaan siswa.</li><li>Mengadakan kajian dan pelatihan rohani.</li></ul>',
            ],
            [
                'name' => 'PASKATEMA',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/paskatema_lcbnyx',
                'long_description' => '<p>Paskibra SMK Telkom Malang (PASKATEMA) adalah organisasi yang mengajarkan kedisiplinan, kekompakan, dan nasionalisme melalui kegiatan baris-berbaris.</p>',
                'visi' => '<p>Mewujudkan generasi muda yang disiplin, tangguh, dan cinta tanah air.</p>',
                'misi' => '<ul><li>Mengembangkan potensi kepemimpinan melalui latihan PBB.</li><li>Menanamkan semangat nasionalisme di kalangan siswa.</li></ul>',
            ],
        ];

        foreach ($organizations as &$organization) {
            $organization['short_description'] = Str::limit(strip_tags($organization['long_description']), 150);
        }

        Organization::insert($organizations);
    }
}
