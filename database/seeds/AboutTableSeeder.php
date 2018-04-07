<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tentang = '<p>Pada tahun 2007, UGM menyatakan visi untuk menjadi Universitas Riset Kelas Dunia, yang berorientasi untuk memenuhi kebutuhan bangsa, berdasarkan Pancasila (Lima Prinsip Dasar Republik Indonesia). Mengingat pentingnya kegiatan penelitian, UGM telah mengambil beberapa langkah yang menempatkan banyak penekanan pada penelitian. Salah satu langkah ini menyatukan kegiatan penelitian dan pelayanan masyarakat menjadi satu lembaga yang disebut Lembaga Penelitian dan Pengabdian Kepada Masyarakat (LPPM).<br><br>Lembaga Penelitian dan Pengabdian Kepada Masyarakat atau LPPM UGM dilahirkan sebagai hasil dari penggabungan antara Lembaga Penelitian dan Lembaga Pengabdian Masyarakat, keduanya merupakan lembaga UGM. Dasar hukum untuk pembentukannya adalah SK Rektor nomor 47/P/SK/HT/2006. Melalui penggabungan dari dua lembaga tersebut, diharapkan hasil dari kegiatan penelitian yang dilakukan di UGM bermanfaat bagi masyarakat dan cukup dekat dengan kebutuhan para pemangku kepentingan. Selanjutnya diharapkan dengan adanya penyatuan peran LPPM UGM tersebut dapat mendukung UGM untuk mencapai visi sebagai universitas riset internasional secara optimal.<br><br>Secara struktural, posisi LPPM berada di bawah koordinasi Wakil Rektor Bidang Penelitian dan Pengabdian Masyarakat. Oleh karena itu, dalam melaksanakan kegiatannya LPPM berkonsultasi dan melaporkan hasil penelitian ke Wakil Rektor Bidang Penelitian, dan Pengabdian Masyarakat. Tugas LPPM adalah memfasilitasi, mengkoordinasikan dan melakukan penelitian serta kegiatan pelayanan masyarakat di UGM, serta terus melakukan pembangunan dan peningkatan kualitas dan kuantitas penelitian dan pelayanan masyarakat, dan melaksanakan penelitian multi-disiplin dan atau penelitian kolaboratif.<br></p>';

        DB::table('profile')->insert([
            'tentang' => $tentang,
            'alamat' => 'Lantai 4 Kampus 4 Universitas Indonesia Timur. <br> Jl. Rappocini Raya No. 171 Makassar.',
            'telp' => '082293425786',
            'email' => 'ristik.jurnal@gmail.com',
            'sk_jurnal' => '<p>Menerima laporan hasil penelitian yang telah diedit untuk dipublikasikan. Naskah diketik spasi 1.5 dengan jumlah halaman antara 1 s.d 10 halaman. Naskah dikirim ke redaksi RISTIK dalam bentuk <b><i>S</i></b><b><i>oft Copy</i></b>.<br></p>',
        ]);
    }
}
