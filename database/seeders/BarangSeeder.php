<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'P001',
                'barang_nama' => 'Kemeja Putih',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'P002',
                'barang_nama' => 'Celana Jeans',
                'harga_beli' => 75000,
                'harga_jual' => 100000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'E001',
                'barang_nama' => 'Laptop',
                'harga_beli' => 5000000,
                'harga_jual' => 7000000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'E002',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 3000000,
                'harga_jual' => 4000000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'PR001',
                'barang_nama' => 'Cincin Berlian',
                'harga_beli' => 1000000,
                'harga_jual' => 1500000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'PR002',
                'barang_nama' => 'Kalung Emas',
                'harga_beli' => 2000000,
                'harga_jual' => 3000000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'ART001',
                'barang_nama' => 'Panci Stainless',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'ART002',
                'barang_nama' => 'Set Peralatan Makan',
                'harga_beli' => 200000,
                'harga_jual' => 300000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'S001',
                'barang_nama' => 'Sepatu Lari',
                'harga_beli' => 300000,
                'harga_jual' => 400000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'S002',
                'barang_nama' => 'Bola Basket',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
        ];

        DB::table('m_barangs')->insert($data);


    }
}
