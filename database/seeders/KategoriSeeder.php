<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'KB001',
                'kategori_nama' => 'Pakaian',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'KB002',
                'kategori_nama' => 'Elektronik',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'KB003',
                'kategori_nama' => 'Perhiasan',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'KB004',
                'kategori_nama' => 'Alat Rumah Tangga',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'KB005',
                'kategori_nama' => 'Perlengkapan Olahraga',
            ],
        ];

        // Memasukkan data kategori ke dalam tabel m_kategoris
        DB::table('m_kategoris')->insert($data);

    }
}
