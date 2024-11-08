<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()->count(35)->create();

        DB::table('categories')->insert([
            ['name' => 'MONOGRAFI HUKUM', 'slug' => Str::slug('MONOGRAFI HUKUM'), 'abbrev' => 'MONOGRAFI HUKUM', 'type_id' => 1],
            ['name' => 'ARTIKEL/MAJALAH HUKUM', 'slug' => Str::slug('ARTIKEL/MAJALAH HUKUM'), 'abbrev' => 'ARTIKEL/MAJALAH HUKUM', 'type_id' => 1],
            ['name' => 'PUTUSAN', 'slug' => Str::slug('PUTUSAN'), 'abbrev' => 'PUTUSAN', 'type_id' => 1],
            ['name' => 'UNDANG-UNDANG DASAR', 'slug' => Str::slug('UNDANG-UNDANG DASAR'), 'abbrev' => 'UUD', 'type_id' => 1],
            ['name' => 'KETETAPAN MPR', 'slug' => Str::slug('KETETAPAN MPR'), 'abbrev' => 'TAP MPR', 'type_id' => 1],
            ['name' => 'UNDANG-UNDANG/ PERPU', 'slug' => Str::slug('UNDANG-UNDANG/ PERPU'), 'abbrev' => 'UU/ PERPU', 'type_id' => 1],
            ['name' => 'PERATURAN PEMERINTAH', 'slug' => Str::slug('PERATURAN PEMERINTAH'), 'abbrev' => 'PP', 'type_id' => 1],
            ['name' => 'PERATURAN PRESIDEN', 'slug' => Str::slug('PERATURAN PRESIDEN'), 'abbrev' => 'PERPRES', 'type_id' => 1],
            ['name' => 'PERATURAN/ KEPUTUSAN MENTERI', 'slug' => Str::slug('PERATURAN/ KEPUTUSAN MENTERI'), 'abbrev' => 'PERMEN/ KEP', 'type_id' => 1],
            ['name' => 'PERATURAN PERUNDANG-UNDANGAN', 'slug' => Str::slug('PERATURAN PERUNDANG-UNDANGAN'), 'abbrev' => 'PERATURAN PERUNDANG-UNDANGAN', 'type_id' => 1],
            ['name' => 'PERATURAN K/L', 'slug' => Str::slug('PERATURAN K/L'), 'abbrev' => 'PERATURAN K/L', 'type_id' => 1],
            ['name' => 'PERATURAN/ KEPUTUSAN BERSAMA', 'slug' => Str::slug('PERATURAN/ KEPUTUSAN BERSAMA'), 'abbrev' => 'PERBER', 'type_id' => 1],
            ['name' => 'PERATURAN DAERAH', 'slug' => Str::slug('PERATURAN DAERAH'), 'abbrev' => 'PERDA', 'type_id' => 1],
            ['name' => 'PERATURAN DESA', 'slug' => Str::slug('PERATURAN DESA'), 'abbrev' => 'PERDES', 'type_id' => 1],
            ['name' => 'BUNGA RAMPAI', 'slug' => Str::slug('BUNGA RAMPAI'), 'abbrev' => 'BUNGA RAMPAI', 'type_id' => 1],
            ['name' => 'TESIS', 'slug' => Str::slug('TESIS'), 'abbrev' => 'TESIS', 'type_id' => 1],
            ['name' => 'DISSERTASI', 'slug' => Str::slug('DISSERTASI'), 'abbrev' => 'DISSERTASI', 'type_id' => 1],
            ['name' => 'BUKU', 'slug' => Str::slug('BUKU'), 'abbrev' => 'BUKU', 'type_id' => 1],
            ['name' => 'KAMUS/ENSIKLOPEDIA', 'slug' => Str::slug('KAMUS/ENSIKLOPEDIA'), 'abbrev' => 'KAMUS/ENSIKLOPEDIA', 'type_id' => 1],
            ['name' => 'BIBLIOGRAFI', 'slug' => Str::slug('BIBLIOGRAFI'), 'abbrev' => 'BIBLIOGRAFI', 'type_id' => 1],
            ['name' => 'JURNAL', 'slug' => Str::slug('JURNAL'), 'abbrev' => 'JURNAL', 'type_id' => 1],
            ['name' => 'ARTIKEL', 'slug' => Str::slug('ARTIKEL'), 'abbrev' => 'ARTIKEL', 'type_id' => 1],
            ['name' => 'MAKALAH', 'slug' => Str::slug('MAKALAH'), 'abbrev' => 'MAKALAH', 'type_id' => 1],
            ['name' => 'PUTUSAN MAHKAMAH AGUNG', 'slug' => Str::slug('PUTUSAN MAHKAMAH AGUNG'), 'abbrev' => 'PUTUSAN MA', 'type_id' => 1],
            ['name' => 'PUTUSAN MAHKAMAH KONSTITUSI', 'slug' => Str::slug('PUTUSAN MAHKAMAH KONSTITUSI'), 'abbrev' => 'PUTUSAN MK', 'type_id' => 1],
        ]);
    }
}
