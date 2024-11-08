<?php

namespace Database\Seeders;

use App\Models\Matter;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Matter::factory()->count(32)->create();

        Matter::create(['name' => 'Bidang Pendidikan', 'slug' => Str::slug('Bidang Pendidikan')]);
            Matter::create(['name' => 'Bidang Kesehatan', 'slug' => Str::slug('Bidang Kesehatan')]);
            Matter::create(['name' => 'Bidang Pekerjaan Umum dan Penataan Ruang', 'slug' => Str::slug('Bidang Pekerjaan Umum dan Penataan Ruang')]);
            Matter::create(['name' => 'Bidang Perumahan Kawasan Permukiman', 'slug' => Str::slug('Bidang Perumahan Kawasan Permukiman')]);
            Matter::create(['name' => 'Bidang Ketentraman dan Ketertiban Umum serta Perlindungan Masyarakat', 'slug' => Str::slug('Bidang Ketentraman dan Ketertiban Umum serta Perlindungan Masyarakat')]);
            Matter::create(['name' => 'Bidang Sosial', 'slug' => Str::slug('Bidang Sosial')]);
            Matter::create(['name' => 'Bidang Tenaga Kerja', 'slug' => Str::slug('Bidang Tenaga Kerja')]);
            Matter::create(['name' => 'Bidang Pemberdayaan Perempuan dan Perlindungan Anak', 'slug' => Str::slug('Bidang Pemberdayaan Perempuan dan Perlindungan Anak')]);
            Matter::create(['name' => 'Bidang Pangan', 'slug' => Str::slug('Bidang Pangan')]);
            Matter::create(['name' => 'Bidang Pertanahan', 'slug' => Str::slug('Bidang Pertanahan')]);
            Matter::create(['name' => 'Bidang Lingkungan Hidup', 'slug' => Str::slug('Bidang Lingkungan Hidup')]);
            Matter::create(['name' => 'Bidang Administrasi Kependudukan dan Pencatatan Sipil', 'slug' => Str::slug('Bidang Administrasi Kependudukan dan Pencatatan Sipil')]);
            Matter::create(['name' => 'Bidang Pemberdayaan Masyarakat dan Desa', 'slug' => Str::slug('Bidang Pemberdayaan Masyarakat dan Desa')]);
            Matter::create(['name' => 'Bidang Pengendalian Penduduk dan Keluarga Berencana', 'slug' => Str::slug('Bidang Pengendalian Penduduk dan Keluarga Berencana')]);
            Matter::create(['name' => 'Bidang Perhubungan', 'slug' => Str::slug('Bidang Perhubungan')]);
            Matter::create(['name' => 'Bidang Komunikasi dan Informatika', 'slug' => Str::slug('Bidang Komunikasi dan Informatika')]);
            Matter::create(['name' => 'Bidang Koperasi, Usaha Kecil dan Menengah', 'slug' => Str::slug('Bidang Koperasi, Usaha Kecil dan Menengah')]);
            Matter::create(['name' => 'Bidang Penanaman Modal', 'slug' => Str::slug('Bidang Penanaman Modal')]);
            Matter::create(['name' => 'Bidang Kepemudaan dan Olahraga', 'slug' => Str::slug('Bidang Kepemudaan dan Olahraga')]);
            Matter::create(['name' => 'Bidang Statistik', 'slug' => Str::slug('Bidang Statistik')]);
            Matter::create(['name' => 'Bidang Persandian', 'slug' => Str::slug('Bidang Persandian')]);
            Matter::create(['name' => 'Bidang Kebudayaan', 'slug' => Str::slug('Bidang Kebudayaan')]);
            Matter::create(['name' => 'Bidang Perpustakaan', 'slug' => Str::slug('Bidang Perpustakaan')]);
            Matter::create(['name' => 'Bidang Kearsipan', 'slug' => Str::slug('Bidang Kearsipan')]);
            Matter::create(['name' => 'Bidang Kelautan dan Perikanan', 'slug' => Str::slug('Bidang Kelautan dan Perikanan')]);
            Matter::create(['name' => 'Bidang Pariwisata', 'slug' => Str::slug('Bidang Pariwisata')]);
            Matter::create(['name' => 'Bidang Pertanian', 'slug' => Str::slug('Bidang Pertanian')]);
            Matter::create(['name' => 'Bidang Kehutanan', 'slug' => Str::slug('Bidang Kehutanan')]);
            Matter::create(['name' => 'Bidang Energi dan Sumber Daya Mineral', 'slug' => Str::slug('Bidang Energi dan Sumber Daya Mineral')]);
            Matter::create(['name' => 'Bidang Perdagangan', 'slug' => Str::slug('Bidang Perdagangan')]);
            Matter::create(['name' => 'Bidang Perindustrian', 'slug' => Str::slug('Bidang Perindustrian')]);
            Matter::create(['name' => 'Bidang Transmigrasi', 'slug' => Str::slug('Bidang Transmigrasi')]);
            Matter::create(['name' => 'Politik Luar Negeri', 'slug' => Str::slug('Politik Luar Negeri')]);
            Matter::create(['name' => 'Keamanan', 'slug' => Str::slug('Keamanan')]);
            Matter::create(['name' => 'Yustisi', 'slug' => Str::slug('Yustisi')]);
            Matter::create(['name' => 'Moneter dan Fiskal Nasional', 'slug' => Str::slug('Moneter dan Fiskal Nasional')]);
            Matter::create(['name' => 'Agama', 'slug' => Str::slug('Agama')]);
            Matter::create(['name' => 'Pertahanan', 'slug' => Str::slug('Pertahanan')]);
    }
}
