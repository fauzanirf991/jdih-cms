<?php

namespace Database\Seeders;

use App\Models\Institute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Institute::factory()->count(20)->create();

        $organizations = [
            [
                'name' => 'Pemerintah Kabupaten Sekadau',
                'slug' => 'pemerintah-kabupaten-sekadau',
                'abbrev' => 'Pemkab Sekadau',
                'desc' => 'Web Pemerintah Kabupaten Sekadau',
            ],
            [
                'name' => 'Dinas Komunikasi dan Informatika',
                'slug' => 'dinas-komunikasi-dan-informatika',
                'abbrev' => 'DisKomInfo',
                'desc' => 'Web Dinas Komunikasi dan Informatika',
            ],
            [
                'name' => 'Sekretariat Daerah',
                'slug' => 'sekretariat-daerah',
                'abbrev' => 'SetDa',
                'desc' => 'Web Sekretariat Daerah',
            ],
            [
                'name' => 'Dinas Pekerjaan Umum dan Penataan Ruang',
                'slug' => 'dinas-pekerjaan-umum-dan-penataan-ruang',
                'abbrev' => 'DPUPR',
                'desc' => 'Web Dinas Pekerjaan Umum dan Penataan Ruang',
            ],
            [
                'name' => 'Dinas Perumahan, Kawasan Permukiman dan Pertanahan',
                'slug' => 'dinas-perumahan-kawasan-permukiman-dan-pertanahan',
                'abbrev' => 'DPKPP',
                'desc' => 'Web Dinas Perumahan, Kawasan Permukiman dan Pertanahan',
            ],
            [
                'name' => 'Badan Perencanaan Pembangunan, Riset dan Inovasi Daerah',
                'slug' => 'badan-perencanaan-pembangunan-riset-dan-inovasi-daerah',
                'abbrev' => 'BAPERIDA',
                'desc' => 'Badan Perencanaan Pembangunan, Riset dan Inovasi Daerah (Bappedarida) Kabupaten Sekadau adalah lembaga pemerintah daerah yang bertugas untuk merencanakan, mengkoordinasikan, memantau, dan mengevaluasi pelaksanaan pembangunan, serta memfasilitasi riset dan inovasi di tingkat daerah. Dalam era digital, Bapperida di berbagai daerah di Indonesia telah memanfaatkan keberadaan website resmi sebagai sarana untuk mempercepat akses informasi publik serta transparansi proses perencanaan, evaluasi, pelaporan pembangunan, serta memfasilitasi kelitbangan.',
            ],
            [
                'name' => 'Dinas Kependudukan dan Pencatatan Sipil',
                'slug' => 'dinas-kependudukan-dan-pencatatan-sipil',
                'abbrev' => 'Dukcapil',
                'desc' => 'Web Dinas Kependudukan dan Pencatatan Sipil',
            ],
            [
                'name' => 'Badan Kepegawaian Pengembangan Sumber Daya Manusia',
                'slug' => 'badan-kepegawaian-pengembangan-sumber-daya-manusia',
                'abbrev' => 'BKPSDM',
                'desc' => 'Web Badan Kepegawaian Pengembangan Sumber Daya Manusia',
            ],
            [
                'name' => 'Dinas Lingkungan Hidup',
                'slug' => 'dinas-lingkungan-hidup',
                'abbrev' => 'DLH',
                'desc' => 'Web Dinas Lingkungan Hidup',
            ],
            [
                'name' => 'Satuan Polisi Pamong Praja',
                'slug' => 'satuan-polisi-pamong-praja',
                'abbrev' => 'SatpolPP',
                'desc' => 'Web Satuan Polisi Pamong Praja',
            ],
            [
                'name' => 'Puskesmas Simpang Empat Kayu Lapis',
                'slug' => 'puskesmas-simpang-empat-kayu-lapis',
                'abbrev' => 'PuskesmasSimpang4',
                'desc' => 'Web Puskesmas Simpang Empat Kayu Lapis',
            ],
            [
                'name' => 'Badan Penanggulangan Bencana Daerah',
                'slug' => 'badan-penanggulangan-bencana-daerah',
                'abbrev' => 'BPBD',
                'desc' => 'Web Badan Penanggulangan Bencana Daerah',
            ],
            [
                'name' => 'Dinas Pemberdayaan Masyarakat dan Desa',
                'slug' => 'dinas-pemberdayaan-masyarakat-dan-desa',
                'abbrev' => 'DPMD',
                'desc' => 'Web Dinas Pemberdayaan Masyarakat dan Desa',
            ],
            [
                'name' => 'Dinas Kepemudaan Olahraga dan Pariwisata',
                'slug' => 'dinas-kepemudaan-olahraga-dan-pariwisata',
                'abbrev' => 'DinasPoraWisata',
                'desc' => 'Web Dinas Kepemudaan Olahraga dan Pariwisata',
            ],
            [
                'name' => 'Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu',
                'slug' => 'dinas-penanaman-modal-dan-pelayanan-terpadu-satu-pintu',
                'abbrev' => 'DPMPTSP',
                'desc' => 'Web Dinas Penanaman Modal & Pelayanan Terpadu Satu Pintu',
            ],
            [
                'name' => 'Dinas Ketahanan Pangan, Pertanian dan Perikanan',
                'slug' => 'dinas-ketahanan-pangan-pertanian-dan-perikanan',
                'abbrev' => 'DKP3',
                'desc' => 'Web Dinas Ketahanan Pangan, Pertanian dan Perikanan',
            ],
            [
                'name' => 'Kecamatan Belitang',
                'slug' => 'kecamatan-belitang',
                'abbrev' => 'KecBelitang',
                'desc' => 'Web Kecamatan Belitang',
            ],
            [
                'name' => 'Badan Kesatuan Bangsa dan Politik',
                'slug' => 'badan-kesatuan-bangsa-dan-politik',
                'abbrev' => 'Kesbangpol',
                'desc' => 'Web Badan Kesatuan Bangsa dan Politik',
            ],
            [
                'name' => 'Kecamatan Sekadau Hilir',
                'slug' => 'kecamatan-sekadau-hilir',
                'abbrev' => 'KecSekadauHilir',
                'desc' => 'Web Kecamatan Sekadau Hilir',
            ],
            [
                'name' => 'Dinas Kearsipan dan Perpustakaan',
                'slug' => 'dinas-kearsipan-dan-perpustakaan',
                'abbrev' => 'DinasKearsipan',
                'desc' => 'Web Dinas Kearsipan dan Perpustakaan',
            ],
            [
                'name' => 'Dinas Perhubungan',
                'slug' => 'dinas-perhubungan',
                'abbrev' => 'DisHub',
                'desc' => 'Web Dinas Perhubungan',
            ],
            [
                'name' => 'Kecamatan Sekadau Hulu',
                'slug' => 'kecamatan-sekadau-hulu',
                'abbrev' => 'Kecsekadauhulu',
                'desc' => 'Web Kecamatan Sekadau Hulu',
            ],
            [
                'name' => 'Dinas Sosial Pemberdayaan Perempuan dan Perlindungan Anak',
                'slug' => 'dinas-sosial-pemberdayaan-perempuan-dan-perlindungan-anak',
                'abbrev' => 'DinsosPPPA',
                'desc' => 'Web Dinas Sosial Pemberdayaan Perempuan dan Perlindungan Anak',
            ],
            [
                'name' => 'Badan Pengelola Keuangan dan Aset Daerah',
                'slug' => 'badan-pengelola-keuangan-dan-aset-daerah',
                'abbrev' => 'BPKAD',
                'desc' => 'Web Badan Pengelola Keuangan dan Aset Daerah',
            ],
            [
                'name' => 'Badan Pengelola Retribusi dan Pajak Daerah',
                'slug' => 'badan-pengelola-retribusi-dan-pajak-daerah',
                'abbrev' => 'BPRPD',
                'desc' => 'Web Badan Pengelola Retribusi dan Pajak Daerah',
            ],
            [
                'name' => 'Dinas Pendidikan dan Kebudayaan',
                'slug' => 'dinas-pendidikan-dan-kebudayaan',
                'abbrev' => 'DIKBUD',
                'desc' => 'Web Dinas Pendidikan',
            ],
            [
                'name' => 'Kecamatan Nanga Taman',
                'slug' => 'kecamatan-nanga-taman',
                'abbrev' => 'KecNgTaman',
                'desc' => 'Web Kecamatan Nanga Taman',
            ],
            [
                'name' => 'Dinas Koperasi, Usaha Kecil Menengah dan Perdagangan',
                'slug' => 'dinas-koperasi-usaha-kecil-menengah-dan-perdagangan',
                'abbrev' => 'DKUKMP',
                'desc' => 'Web Dinas Koperasi, Usaha Kecil Menengah dan Perdagangan',
            ],
            [
                'name' => 'Sekretariat DPRD',
                'slug' => 'sekretariat-dprd',
                'abbrev' => 'SetDPRD',
                'desc' => 'Web Sekretariat DPRD',
            ],
            [
                'name' => 'Kecamatan Belitang Hulu',
                'slug' => 'kecamatan-belitang-hulu',
                'abbrev' => 'KecBelitangHulu',
                'desc' => 'Web Kecamatan Belitang Hulu',
            ],
            [
                'name' => 'Inspektorat',
                'slug' => 'inspektorat',
                'abbrev' => 'Inspektorat',
                'desc' => 'Web Inspektorat',
            ],
            [
                'name' => 'Kecamatan Nanga Mahap',
                'slug' => 'kecamatan-nanga-mahap',
                'abbrev' => 'KecnangaMahap',
                'desc' => 'Web Kecamatan Nanga Mahap',
            ],
            [
                'name' => 'Kecamatan Belitang Hilir',
                'slug' => 'kecamatan-belitang-hilir',
                'abbrev' => 'KecBelitangHilir',
                'desc' => 'Web Kecamatan Belitang Hilir',
            ],
            [
                'name' => 'Dinas Kesehatan Pengendalian Penduduk dan Keluarga Berencana',
                'slug' => 'dinas-kesehatan-pengendalian-penduduk-dan-keluarga-berencana',
                'abbrev' => 'DinkesPPKB',
                'desc' => 'Web Dinas Kesehatan Pengendalian Penduduk dan Keluarga Berencana',
            ],
            [
                'name' => 'Puskesmas Rawak',
                'slug' => 'puskesmas-rawak',
                'abbrev' => 'PkmRawak',
                'desc' => 'Web Puskesmas Rawak',
            ],
            [
                'name' => 'Puskesmas Sebetung',
                'slug' => 'puskesmas-sebetung',
                'abbrev' => 'PkmSebetung',
                'desc' => 'Web Puskesmas Sebetung',
            ],
            [
                'name' => 'Puskesmas Sungai Ayak',
                'slug' => 'puskesmas-sungai-ayak',
                'abbrev' => 'PkmSungaiAyak',
                'desc' => 'Web Puskesmas Sungai Ayak',
            ],
            [
                'name' => 'Puskesmas Sekadau',
                'slug' => 'puskesmas-sekadau',
                'abbrev' => 'PkmSekadau',
                'desc' => 'Web Puskesmas Sekadau',
            ],
            [
                'name' => 'Puskesmas Nanga Belitang',
                'slug' => 'puskesmas-nanga-belitang',
                'abbrev' => 'PkmNangaBelitang',
                'desc' => 'Web Puskesmas Nanga Belitang',
            ],
            [
                'name' => 'Puskesmas Nanga Taman',
                'slug' => 'puskesmas-nanga-taman',
                'abbrev' => 'PkmNangaTaman',
                'desc' => 'Web Puskesmas Nanga Taman',
            ],
            [
                'name' => 'Puskesmas Balai Sepuak',
                'slug' => 'puskesmas-balai-sepuak',
                'abbrev' => 'PkmbalaiSepuak',
                'desc' => 'Web Puskesmas Balai Sepuak',
            ],
            [
                'name' => 'Puskesmas Selalong',
                'slug' => 'puskesmas-selalong',
                'abbrev' => 'PkmSelalong',
                'desc' => 'Web Puskesmas Selalong',
            ],
            [
                'name' => 'Puskesmas Tapang Perodah',
                'slug' => 'puskesmas-tapang-perodah',
                'abbrev' => 'PkmTapangPerodah',
                'desc' => 'Web Puskesmas Tapang Perodah',
            ],
            [
                'name' => 'Puskesmas SP III Trans',
                'slug' => 'puskesmas-sp3-trans',
                'abbrev' => 'PuskesmasSPIIITrans',
                'desc' => 'Web Puskesmas SP III Trans',
            ],
            [
                'name' => 'Dinas Pemadam Kebakaran dan Penyelamatan',
                'slug' => 'dinas-pemadam-kebakaran-dan-penyelamatan',
                'abbrev' => 'dpkp',
                'desc' => 'Web Pemadam Kebakaran',
            ],
        ];

        // Insert all records in one operation
        foreach ($organizations as $org) {
            Institute::create($org);
        }
    }
}
