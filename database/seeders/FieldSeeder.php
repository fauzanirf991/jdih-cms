<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Field::factory()->count(15)->create();
        $data = [
            ['name' => 'Hukum Tata Negara', 'slug' => 'hukum-tata-negara'],
            ['name' => 'Hukum Pidana', 'slug' => 'hukum-pidana'],
            ['name' => 'Hukum Perburuhan', 'slug' => 'hukum-perburuhan'],
            ['name' => 'Hukum Perdata', 'slug' => 'hukum-perdata'],
            ['name' => 'Hukum Lingkungan', 'slug' => 'hukum-lingkungan'],
            ['name' => 'Hukum Internasional', 'slug' => 'hukum-internasional'],
            ['name' => 'Hukum Dagang', 'slug' => 'hukum-dagang'],
            ['name' => 'Hukum Islam', 'slug' => 'hukum-islam'],
            ['name' => 'Hukum Agraria', 'slug' => 'hukum-agraris'],
            ['name' => 'Hukum Administrasi Negara', 'slug' => 'hukum-administrasi-negara'],
            ['name' => 'Hukum Adat', 'slug' => 'hukum-adat'],
            ['name' => 'Hukum Pada Umumnya', 'slug' => 'hukum-pada-umumnya'],
            ['name' => 'Himpunan Peraturan', 'slug' => 'himpunan-peraturan'],
            ['name' => 'Putusan Pengadilan', 'slug' => 'putusan-peradilan'],
            ['name' => 'Referensi', 'slug' => 'referensi'],
            ['name' => 'Hak Asasi Manusia', 'slug' => 'hak-asasi-manusia'],
            ['name' => 'Hukum Kekayaan Intelektual', 'slug' => 'hukum-kekayaan-intelektual'],
            ['name' => 'Umum', 'slug' => 'umum'],
            ['name' => 'Hukum Kesehatan', 'slug' => 'hukum-kesehatan'],
            ['name' => 'Hukum Laut', 'slug' => 'hukum-laut'],
            ['name' => 'Hukum Udara', 'slug' => 'hukum-udara'],
            ['name' => 'Hukum Acara', 'slug' => 'hukum-acara'],
            ['name' => 'Ilmu Hukum' , 'slug' => 'ilmu-hukum'],
        ];

        foreach($data as $item){
            Field::create($item);
        }
    }
}
