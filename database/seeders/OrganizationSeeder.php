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
                    <p><strong>Organisasi Siswa Intra Sekolah (OSIS)</strong> merupakan wadah resmi bagi seluruh peserta didik SMK Telkom Malang untuk mengembangkan kemampuan kepemimpinan, tanggung jawab, serta keterampilan sosial dalam skala nyata.</p>
                    <p>OSIS menjadi motor penggerak utama kegiatan kesiswaan di sekolah. Setiap tahun, OSIS merancang program kerja yang berorientasi pada pengembangan karakter, peningkatan prestasi, dan pembentukan budaya sekolah yang positif. Melalui berbagai kegiatan seperti Masa Pengenalan Lingkungan Sekolah (MPLS), class meeting, pentas seni, bakti sosial, dan kegiatan nasionalisme, OSIS membentuk siswa agar mampu bekerja sama, berpikir kreatif, dan memiliki empati terhadap sesama.</p>
                    <p>OSIS juga berperan sebagai jembatan komunikasi antara pihak sekolah dan seluruh siswa. Dalam menjalankan programnya, OSIS menjunjung tinggi prinsip demokrasi, keterbukaan, dan tanggung jawab. Setiap anggota OSIS dididik untuk menjadi teladan dalam disiplin, sopan santun, dan semangat gotong royong. Dengan struktur organisasi yang lengkap, mulai dari ketua, sekretaris, bendahara, hingga berbagai bidang seperti bidang keagamaan, lingkungan, seni budaya, olahraga, dan teknologi, OSIS menjadi miniatur pemerintahan siswa di sekolah.</p>
                    <p>Selain itu, OSIS SMK Telkom Malang berkomitmen untuk terus berkembang mengikuti zaman. Dalam era digital ini, OSIS juga berinovasi dengan menggunakan platform digital untuk publikasi kegiatan, sistem administrasi daring, dan komunikasi yang efisien. OSIS bukan sekadar organisasi, tetapi ruang belajar kehidupan yang sesungguhnya bagi generasi muda untuk menjadi pemimpin masa depan.</p>
                ',
                'visi' => '<p>Menjadi organisasi siswa yang berkarakter, inovatif, dan berintegritas tinggi dalam membentuk generasi unggul.</p>',
                'misi' => '<ul><li>Menanamkan nilai disiplin dan tanggung jawab pada seluruh siswa.</li><li>Mengembangkan kreativitas dan potensi siswa dalam berbagai bidang.</li><li>Menjadi wadah aspirasi dan inspirasi siswa SMK Telkom Malang.</li><li>Membangun lingkungan sekolah yang harmonis, produktif, dan berprestasi.</li></ul>',
            ],
            [
                'name' => 'MPK',
                'is_organization' => true,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/mpk_dvx9zl',
                'long_description' => '
                    <p><strong>Majelis Permusyawaratan Kelas (MPK)</strong> merupakan lembaga legislatif siswa di SMK Telkom Malang yang memiliki peran strategis sebagai pengawas dan mitra kerja OSIS dalam menjalankan roda organisasi kesiswaan.</p>
                    <p>MPK terdiri dari perwakilan setiap kelas yang dipilih secara demokratis, sehingga menjadi wadah aspirasi seluruh siswa. Tugas utama MPK adalah memastikan bahwa setiap kegiatan OSIS berjalan sesuai visi, misi, dan aturan sekolah, serta tetap berpihak pada kepentingan siswa secara keseluruhan. MPK juga berfungsi sebagai lembaga penyalur ide dan kritik konstruktif untuk menciptakan kegiatan yang inovatif dan relevan dengan kebutuhan peserta didik.</p>
                    <p>Selain peran pengawasan, MPK juga menjadi lembaga pendidikan karakter. Anggota MPK dilatih untuk berpikir kritis, berargumentasi secara logis, menghargai perbedaan pendapat, dan mengedepankan musyawarah dalam pengambilan keputusan. Dalam sidang pleno dan rapat komisi, MPK membahas berbagai isu kesiswaan dan menyusun rekomendasi bagi OSIS dan pihak sekolah.</p>
                    <p>Dengan semangat demokrasi dan tanggung jawab moral, MPK SMK Telkom Malang terus berupaya mencetak pemimpin muda yang mampu menjaga nilai integritas, transparansi, dan profesionalitas. MPK tidak hanya mengawasi, tetapi juga membimbing, menginspirasi, dan menjadi contoh bagi siswa lain dalam hal kedewasaan berpikir dan bertindak.</p>
                ',
                'visi' => '<p>Menjadi lembaga siswa yang demokratis, aspiratif, dan bertanggung jawab sebagai pilar pengawasan kegiatan OSIS.</p>',
                'misi' => '<ul><li>Mengawasi pelaksanaan program OSIS agar berjalan efektif dan transparan.</li><li>Menampung, membahas, dan menyalurkan aspirasi siswa.</li><li>Mendorong terciptanya budaya organisasi yang jujur, terbuka, dan disiplin.</li><li>Menegakkan etika dan peraturan organisasi di lingkungan sekolah.</li></ul>',
            ],

            // === SUB ORGANISASI ===
            [
                'name' => 'METIC',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/metic_x7nhga',
                'long_description' => '
                    <p><strong>METIC (Moklet Education and Technology Innovation Club)</strong> adalah komunitas teknologi di SMK Telkom Malang yang berfokus pada pengembangan ilmu pengetahuan, riset, dan inovasi digital.</p>
                    <p>METIC menjadi wadah bagi siswa yang memiliki minat di bidang teknologi informasi, pemrograman, desain sistem, dan kecerdasan buatan. Setiap anggota METIC dilatih untuk memahami konsep teknologi modern melalui kegiatan praktis seperti pelatihan coding, kompetisi inovasi digital, pengembangan aplikasi mobile dan web, serta implementasi Internet of Things (IoT).</p>
                    <p>Selain itu, METIC juga mendorong kolaborasi antar anggota untuk menciptakan proyek nyata yang memberikan manfaat bagi sekolah dan masyarakat. Banyak karya inovatif lahir dari komunitas ini, seperti sistem absensi digital, platform pembelajaran online, hingga alat IoT ramah lingkungan. Dengan semangat belajar mandiri dan eksploratif, METIC menjadi inkubator ide bagi calon teknopreneur muda di lingkungan sekolah.</p>
                    <p>METIC bukan hanya tempat belajar teknologi, tetapi juga ruang untuk menanamkan nilai kolaborasi, problem-solving, dan berpikir kreatif. Melalui pendekatan berbasis proyek (project-based learning), siswa dapat memahami bagaimana teknologi dapat digunakan untuk menyelesaikan tantangan nyata di dunia kerja dan kehidupan sehari-hari.</p>
                ',
                'visi' => '<p>Menjadi komunitas pelajar teknologi yang kreatif, solutif, dan adaptif terhadap perkembangan zaman.</p>',
                'misi' => '<ul><li>Meningkatkan kompetensi siswa dalam bidang teknologi dan inovasi.</li><li>Mendorong partisipasi siswa dalam lomba teknologi tingkat lokal dan nasional.</li><li>Membangun ekosistem digital kreatif di lingkungan sekolah.</li></ul>',
            ],
            [
                'name' => 'MEMO',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/memo_x9czvb',
                'long_description' => '
                    <p><strong>MEMO (Media dan Komunikasi)</strong> adalah komunitas yang berperan penting sebagai pengelola publikasi, dokumentasi, dan penyebaran informasi di lingkungan SMK Telkom Malang.</p>
                    <p>Anggota MEMO berperan sebagai jurnalis sekolah yang meliput berbagai kegiatan, membuat konten digital, dan mendesain media komunikasi yang menarik. Mereka menguasai keterampilan fotografi, videografi, jurnalistik, desain grafis, hingga pengelolaan media sosial. Melalui konten kreatifnya, MEMO membantu membangun citra positif sekolah serta menumbuhkan minat siswa dalam dunia komunikasi dan media digital.</p>
                    <p>Komunitas ini juga menjadi ruang belajar yang dinamis bagi siswa untuk memahami etika publikasi, manajemen komunikasi, serta penggunaan teknologi digital dalam penyebaran informasi. Dengan pendekatan profesional, MEMO berfungsi sebagai pusat dokumentasi dan arsip visual sekolah yang menjaga sejarah dan identitas SMK Telkom Malang.</p>
                    <p>Lebih dari sekadar komunitas kreatif, MEMO menjadi tempat bagi siswa untuk mengekspresikan ide dan sudut pandangnya secara bebas namun bertanggung jawab. Di era digital saat ini, kehadiran MEMO menjadi sangat penting dalam menjaga keterbukaan informasi dan menumbuhkan budaya literasi media di kalangan pelajar.</p>
                ',
                'visi' => '<p>Menjadi pusat media kreatif, informatif, dan inspiratif sekolah.</p>',
                'misi' => '<ul><li>Mengelola publikasi dan dokumentasi kegiatan sekolah secara profesional.</li><li>Meningkatkan keterampilan komunikasi dan desain media siswa.</li><li>Membangun jaringan komunikasi positif antar organisasi sekolah.</li></ul>',
            ],
            [
                'name' => 'MAC',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/mac_kjhrzb',
                'long_description' => '
                    <p><strong>Moklet Art Community (MAC)</strong> merupakan wadah ekspresi seni dan kreativitas siswa SMK Telkom Malang. Komunitas ini menaungi berbagai bidang seni seperti musik, tari, teater, sastra, dan seni rupa. MAC hadir sebagai ruang bagi para pelajar untuk menyalurkan bakat serta mengasah kemampuan artistik mereka agar dapat berkembang menjadi individu yang kreatif dan berbudaya.</p>
                    <p>Melalui latihan rutin, workshop seni, hingga pementasan di berbagai event sekolah maupun luar sekolah, MAC membuktikan bahwa siswa teknologi juga mampu berprestasi di bidang seni. Kegiatan MAC tidak hanya berorientasi pada hiburan, tetapi juga pembentukan karakter melalui seni yang mengajarkan kedisiplinan, kerja sama, dan kepekaan terhadap lingkungan sosial.</p>
                    <p>MAC juga berperan sebagai pelopor dalam menjaga dan mengembangkan budaya lokal. Berbagai pementasan yang mereka tampilkan sering kali memadukan unsur modern dengan kearifan lokal, menciptakan karya yang unik dan menginspirasi. Dengan semangat inklusif, MAC membuka kesempatan bagi siapa pun yang ingin belajar seni, tanpa memandang latar belakang atau kemampuan awal.</p>
                    <p>Komunitas ini terus berinovasi dalam menghadirkan karya-karya baru yang mampu membangkitkan semangat apresiasi seni di kalangan siswa. Melalui MAC, seni bukan hanya menjadi hiburan, tetapi juga media pembentukan karakter dan sarana komunikasi universal di lingkungan sekolah.</p>
                ',
                'visi' => '<p>Menumbuhkan dan menyalurkan bakat seni siswa agar menjadi pribadi kreatif dan berbudaya.</p>',
                'misi' => '<ul><li>Mengembangkan kreativitas dan kemampuan seni di berbagai bidang.</li><li>Mengadakan pertunjukan, lomba, dan pameran seni secara berkala.</li><li>Mendorong pelestarian budaya lokal di lingkungan sekolah.</li></ul>',
            ],
            [
                'name' => 'COMET',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/comet_gcpuzf',
                'long_description' => '
                    <p><strong>Community of Moklet English Talent (COMET)</strong> merupakan komunitas pelajar SMK Telkom Malang yang fokus pada pengembangan kemampuan berbahasa Inggris secara aktif dan komunikatif. COMET menjadi tempat bagi siswa yang ingin memperdalam keterampilan berbicara, menulis, mendengarkan, dan membaca dalam bahasa internasional ini.</p>
                    <p>Melalui kegiatan seperti English Conversation Club, Speech Contest, Debate Class, dan Writing Workshop, COMET membantu anggotanya meningkatkan rasa percaya diri dalam menggunakan bahasa Inggris di berbagai konteks. Kegiatan dilakukan secara interaktif dan menyenangkan, baik melalui diskusi ringan maupun simulasi situasi nyata seperti wawancara dan presentasi publik.</p>
                    <p>Selain kegiatan internal, COMET juga sering berpartisipasi dalam lomba bahasa Inggris tingkat regional maupun nasional. Setiap anggota didorong untuk berani mengekspresikan diri dalam bahasa Inggris dan menggunakan kemampuan tersebut untuk memperluas wawasan serta membuka peluang global di masa depan.</p>
                    <p>Lebih dari sekadar klub bahasa, COMET juga menjadi komunitas yang menanamkan nilai kepercayaan diri, kolaborasi, dan semangat belajar tanpa batas. Dengan pembinaan dari guru dan alumni yang kompeten, COMET telah mencetak banyak siswa berprestasi yang berhasil bersaing di ajang nasional hingga internasional.</p>
                ',
                'visi' => '<p>Mengasah kemampuan berbahasa Inggris siswa secara komunikatif, kompetitif, dan berkarakter global.</p>',
                'misi' => '<ul><li>Meningkatkan kemampuan speaking dan writing siswa.</li><li>Menumbuhkan kepercayaan diri dalam menggunakan bahasa Inggris.</li><li>Mendorong siswa berprestasi dalam kompetisi bahasa Inggris.</li></ul>',
            ],
            [
                'name' => 'PUSTEL',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/pustel_hvbrcb',
                'long_description' => '
                    <p><strong>PUSTEL (Perpustakaan Telkom)</strong> adalah komunitas literasi di SMK Telkom Malang yang berperan sebagai pengelola perpustakaan sekaligus penggerak budaya membaca di lingkungan sekolah. Komunitas ini berkomitmen untuk menjadikan membaca sebagai gaya hidup positif di kalangan siswa.</p>
                    <p>Anggota PUSTEL bertanggung jawab terhadap pengelolaan koleksi buku, pelayanan peminjaman, dan perawatan arsip perpustakaan. Namun lebih dari itu, mereka juga aktif mengadakan kegiatan literasi seperti book review, lomba menulis, pojok baca kreatif, dan seminar literasi digital untuk memperkenalkan pentingnya informasi dan pengetahuan.</p>
                    <p>Melalui kegiatan tersebut, PUSTEL berusaha menciptakan suasana perpustakaan yang modern, nyaman, dan interaktif. Tidak hanya buku cetak, PUSTEL juga memperluas jangkauan dengan menghadirkan koleksi digital yang dapat diakses oleh seluruh warga sekolah. Hal ini menjadi bentuk adaptasi terhadap perkembangan teknologi informasi yang semakin cepat.</p>
                    <p>Dengan semangat “Satu Buku, Seribu Inspirasi”, PUSTEL tidak hanya menjadi tempat menyimpan buku, tetapi juga ruang inspiratif tempat ide-ide baru tumbuh dan berkembang. Komunitas ini mengajak siswa untuk menulis, membaca, dan berpikir kritis agar mampu menjadi generasi yang cerdas dan berwawasan luas.</p>
                ',
                'visi' => '<p>Meningkatkan minat baca dan literasi digital di kalangan siswa SMK Telkom Malang.</p>',
                'misi' => '<ul><li>Mengelola dan mengembangkan koleksi buku serta bahan literasi digital.</li><li>Mengadakan kegiatan literasi yang edukatif dan menyenangkan.</li><li>Membangun budaya membaca dan menulis di kalangan siswa.</li></ul>',
            ],
            [
                'name' => 'PMR',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/pmr_yvlhxt',
                'long_description' => '
                    <p><strong>Palang Merah Remaja (PMR)</strong> adalah organisasi sosial kemanusiaan di SMK Telkom Malang yang bernaung di bawah Palang Merah Indonesia (PMI). PMR bertujuan menanamkan nilai kepedulian, solidaritas, dan tanggung jawab sosial di kalangan pelajar.</p>
                    <p>Kegiatan PMR mencakup pelatihan pertolongan pertama, donor darah, simulasi tanggap darurat bencana, dan kampanye hidup sehat. Melalui berbagai pelatihan tersebut, anggota PMR dibekali kemampuan dasar kesehatan dan tanggap situasi darurat. Selain itu, mereka juga aktif menjadi relawan dalam kegiatan sosial baik di lingkungan sekolah maupun masyarakat.</p>
                    <p>PMR mengajarkan arti penting kemanusiaan melalui aksi nyata, bukan hanya teori. Setiap kegiatan menumbuhkan empati dan rasa saling membantu antar sesama. Di bawah bimbingan pembina dan PMI Kota Malang, PMR SMK Telkom Malang sering terlibat dalam kegiatan sosial berskala besar seperti penanganan bencana dan pelatihan relawan muda.</p>
                    <p>PMR bukan hanya organisasi kesehatan, tetapi juga tempat pembentukan karakter yang menanamkan nilai tolong-menolong, tanggung jawab, dan keikhlasan. Anggota PMR dikenal disiplin, berani, dan siap membantu siapa pun tanpa memandang latar belakang.</p>
                ',
                'visi' => '<p>Mewujudkan generasi muda yang sehat, peduli, dan berjiwa kemanusiaan tinggi.</p>',
                'misi' => '<ul><li>Meningkatkan kemampuan pertolongan pertama bagi siswa.</li><li>Berpartisipasi aktif dalam kegiatan sosial dan kemanusiaan.</li><li>Menumbuhkan semangat relawan di lingkungan sekolah.</li></ul>',
            ],
            [
                'name' => 'PALWAGA',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/palwaga_mqubty',
                'long_description' => '
                    <p><strong>Pasukan Pengibar Bendera (PALWAGA)</strong> adalah tim kehormatan sekolah yang memiliki tugas utama dalam pelaksanaan upacara bendera serta kegiatan kenegaraan lainnya di SMK Telkom Malang. PALWAGA dikenal karena kedisiplinan, ketepatan, dan semangat nasionalisme yang tinggi.</p>
                    <p>Anggota PALWAGA dilatih untuk memiliki fisik yang kuat, mental tangguh, dan rasa tanggung jawab yang tinggi. Latihan rutin dilakukan untuk membentuk karakter disiplin dan kekompakan tim. Selain bertugas di sekolah, PALWAGA juga kerap mengikuti lomba baris-berbaris (PBB) dan kegiatan nasional seperti pelatihan paskibraka tingkat kota maupun provinsi.</p>
                    <p>PALWAGA menjadi simbol kehormatan dan kebanggaan sekolah. Mereka tidak hanya bertugas menaikkan dan menurunkan bendera, tetapi juga menjadi teladan dalam hal kedisiplinan, sopan santun, serta loyalitas terhadap sekolah. Kegiatan mereka mengajarkan arti penting semangat nasionalisme dan cinta tanah air di kalangan pelajar.</p>
                    <p>Dengan semangat “Tegak Disiplin, Jaya Pengabdian”, PALWAGA terus menanamkan nilai patriotisme kepada generasi muda agar menjadi siswa yang kuat, tangguh, dan memiliki rasa bangga terhadap identitas bangsa.</p>
                ',
                'visi' => '<p>Menjadi simbol kedisiplinan dan kehormatan sekolah yang berjiwa nasionalisme tinggi.</p>',
                'misi' => '<ul><li>Menegakkan semangat nasionalisme dan kebangsaan di sekolah.</li><li>Melatih kedisiplinan, ketangkasan, dan tanggung jawab siswa.</li><li>Menjadi panutan dalam sikap dan tata tertib di lingkungan sekolah.</li></ul>',
            ],
            [
                'name' => 'BDI',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/bdi_sfd2nx',
                'long_description' => '
                    <p><strong>Badan Dakwah Islam (BDI)</strong> adalah organisasi keagamaan siswa SMK Telkom Malang yang berfokus pada pengembangan spiritualitas, akhlak, dan keilmuan Islam. BDI menjadi pusat kegiatan keagamaan di sekolah yang berperan membimbing siswa agar memiliki karakter Islami dalam setiap aspek kehidupan.</p>
                    <p>Berbagai kegiatan rutin seperti kajian keislaman, mentoring, tadarus, dan peringatan hari besar Islam menjadi sarana bagi siswa untuk memperdalam ilmu agama dan memperkuat hubungan dengan Allah SWT. Selain itu, BDI juga aktif mengadakan kegiatan sosial seperti santunan anak yatim, buka puasa bersama, dan penggalangan dana kemanusiaan.</p>
                    <p>Melalui program pembinaan rohani, BDI menumbuhkan nilai-nilai kejujuran, kesederhanaan, dan saling menghormati antar sesama. Organisasi ini juga membina generasi muda agar mampu menjadi pemimpin yang berakhlak mulia dan bermanfaat bagi masyarakat.</p>
                    <p>BDI SMK Telkom Malang terus beradaptasi dengan perkembangan zaman melalui dakwah digital, konten edukatif, dan kolaborasi dengan organisasi lain untuk memperluas pengaruh positifnya. Dengan semangat dakwah dan persaudaraan, BDI menjadi benteng moral bagi seluruh siswa.</p>
                ',
                'visi' => '<p>Menumbuhkan generasi Islami yang berakhlak, berilmu, dan berjiwa dakwah.</p>',
                'misi' => '<ul><li>Meningkatkan kegiatan keagamaan siswa melalui program rutin.</li><li>Membangun solidaritas antar siswa dalam semangat ukhuwah Islamiyah.</li><li>Mengembangkan dakwah kreatif di era digital.</li></ul>',
            ],
            [
                'name' => 'PASKATEMA',
                'is_organization' => false,
                'mentor_id' => 1,
                'logo' => 'https://res.cloudinary.com/dvpb6z2oj/image/upload/t_media_lib_thumb/paskatema_lcbnyx',
                'long_description' => '
                    <p><strong>Paskibra SMK Telkom Malang (PASKATEMA)</strong> adalah organisasi yang menanamkan semangat nasionalisme, kedisiplinan, dan cinta tanah air melalui kegiatan baris-berbaris serta pelatihan kepemimpinan.</p>
                    <p>PASKATEMA menjadi salah satu organisasi dengan tingkat kedisiplinan tinggi di sekolah. Setiap anggotanya dibina untuk memiliki mental kuat, kemampuan fisik prima, dan rasa tanggung jawab yang tinggi. Pelatihan dilakukan secara teratur mencakup PBB, formasi barisan, hingga kepemimpinan dan kerja tim. Selain itu, anggota PASKATEMA juga sering mengikuti kompetisi paskibra tingkat kota dan provinsi.</p>
                    <p>Organisasi ini bukan hanya melatih fisik, tetapi juga membentuk karakter. Siswa belajar pentingnya ketegasan, solidaritas, serta menghargai proses perjuangan dalam mencapai tujuan. Melalui kegiatan rutin, mereka juga menjadi pelaksana utama upacara bendera di sekolah yang mencerminkan kedisiplinan dan kehormatan nasional.</p>
                    <p>PASKATEMA terus menjadi simbol semangat juang siswa SMK Telkom Malang, menunjukkan bahwa nasionalisme dapat diwujudkan dalam tindakan nyata melalui latihan, kerja keras, dan pengabdian kepada sekolah serta bangsa.</p>
                ',
                'visi' => '<p>Mewujudkan generasi muda yang disiplin, tangguh, dan cinta tanah air.</p>',
                'misi' => '<ul><li>Mengembangkan potensi kepemimpinan melalui latihan PBB dan organisasi.</li><li>Menanamkan semangat nasionalisme di kalangan siswa.</li><li>Menjadi panutan dalam kedisiplinan dan loyalitas terhadap sekolah.</li></ul>',
            ],
        ];

        foreach ($organizations as &$organization) {
            $organization["short_description"] = Str::limit(strip_tags($organization["long_description"]), 150);
        }

        Organization::insert($organizations);
    }
}
