<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'title' => 'Siswa SMK Telkom Malang Raih Emas di LKS Nasional 2025',
            'author_id' => 1, // Pastikan user dengan ID 1 ada (admin)
            'slug' => Str::slug('Siswa SMK Telkom Malang Raih Emas di LKS Nasional 2025'),
            'thumbnail' => 'https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/81/2025/08/05/IMG-20250805-WA0001-1021284780.jpg',
            'short_body' => 'Siswa SMK Telkom Malang meraih medali emas pada ajang LKS Nasional 2025 melalui perwakilan M. Rezky Eksatama di bidang IT Software Solution for Business.',
            'tags' => 'Prestasi, SMK Telkom Malang, LKS Nasional, Pendidikan',
            'is_published' => true,
            'approval_status' => 'approved',
            'body' => <<<HTML
<p><strong>MALANG KOTA</strong> – Siswa <em>SMK Telkom Malang</em> kembali menorehkan prestasi istimewa dengan meraih <strong>medali emas</strong> pada ajang <em>Lomba Kompetensi Siswa (LKS)</em> tingkat Nasional yang digelar pada <strong>Kamis (31/7)</strong>.</p>

<p>Sebelumnya, <strong>Provinsi Jawa Timur</strong> telah berhasil mempertahankan gelar <em>Juara Umum</em> selama tiga tahun berturut-turut sejak 2023 pada ajang bergengsi ini. Capaian tersebut tidak lepas dari kontribusi luar biasa <strong>Kota Malang</strong> sebagai salah satu penyumbang medali emas terbanyak.</p>

<p>Pada LKS SMK tingkat Nasional tahun ini, <strong>SMK Telkom Malang</strong> diwakili oleh <strong>M. Rezky Eksatama</strong>, siswa kelas XII program <em>Study Abroad</em> jurusan <strong>Rekayasa Perangkat Lunak (RPL)</strong>. Ia berhasil menjadi yang terbaik di bidang lomba <em>IT Software Solution for Business</em>.</p>

<p>Siswa asli Malang ini berhasil mengungguli peserta dari 31 provinsi lainnya. “<em>Alhamdulillah bisa pecah telur, di tingkat kota, provinsi, dan nasional, saya bisa meraih juara 1</em>,” ungkap Rezky dengan penuh syukur. Ia mengaku telah mempersiapkan diri sejak bulan <strong>Desember 2024</strong>.</p>

<figure>
  <figcaption><em>SEMPURNA:</em> SMK Telkom Malang berhasil meraih Juara 1 bidang lomba IT Software Solution for Business LKS SMK Nasional 2025, Kamis (31/7).</figcaption>
</figure>

<p>Pembina lomba, <strong>Amalia Ramadhanthy, S.Kom</strong> yang juga guru RPL di SMK Telkom Malang, mengungkapkan rasa bangga dan harunya atas pencapaian siswa bimbingannya tersebut. “<em>Pencapaian yang luar biasa. Saya masuk pada 2023, tahun lalu kami tidak lolos provinsi. Tahun 2025 ini, persiapan kami jauh lebih matang, mental kami sudah terasah, dan kami siap memborong juara</em>,” jelas Amalia.</p>

<p>Sebagai bentuk apresiasi, pihak sekolah memberikan <strong>beasiswa khusus</strong> kepada siswa berprestasi tersebut, serta <strong>bonus penghargaan</strong> bagi guru pembina lomba LKS Nasional.</p>

<p>Sementara itu, Kepala SMK Telkom Malang, <strong>Rahmat Dwi Djatmiko, S.Kom</strong>, menegaskan bahwa sekolah akan terus mendukung dan memfasilitasi bakat serta minat siswa. “<em>Prestasi LKS ini akan menjadi kebanggaan sekaligus portofolio yang bermanfaat bagi siswa kelak ketika lulus, baik untuk melanjutkan studi maupun memasuki dunia kerja</em>,” ungkapnya.</p>

<p><em>Sumber: Radar Malang</em></p>
HTML,
        ]);
    }
}
