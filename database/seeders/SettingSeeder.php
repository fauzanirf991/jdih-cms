<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'appName'       => 'JDIH Kabupaten Sekadau',
            'appDesc'       => 'Jaringan Dokumentasi dan Informasi Hukum Pemerintah Kabupaten Sekadau',
            'appLogo'       => asset('assets/admin/images/logo-home.png'),
            'appUrl'        => url()->current(),
            'company'       => 'Pemerintah Kabupaten Sekadau',
            'companyUrl'    => 'https://sekadaukab.go.id',
            'address'       => 'Jl Merdeka Timur KM.9',
            'city'          => 'Sekadau',
            'district'      => 'Sekadau Hilir',
            'regency'       => 'Kabupaten Sekadau',
            'province'      => 'Kalimantan Barat',
            'zip'           => '79582',
            'phone'         => '085828382170',
            'fax'           => null,
            'email'         => 'kominfo@sekadaukab.go.id',
            'facebook'      => 'https://www.facebook.com/MadahSekadau/',
            'twitter'       => null,
            'instagram'     => null,
            'tiktok'        => null,
            'youtube'       => null,
            'jdihnLogo'     => asset('assets/admin/images/logo-home.png'),
            'jdihnTitle'    => 'Jaringan Dokumentasi dan Informasi Hukum Nasional',
            'jdihnUrl'      => 'https://jdihn.go.id',
            'region_code'   => 6109,
            'maintenance'   => null,
            'questionner'   => "{\"title\":\"Indeks Kepuasan Masyarakat\",\"desc\":\"Untuk mengetahui tingkat kepuasan masyarakat terhadap layanan JDIH\",\"active\":1}",
        ];

        foreach ($settings as $key => $value) {
            Setting::create([
                'key'   => $key,
                'value' => $value
            ]);
        }
    }
}
