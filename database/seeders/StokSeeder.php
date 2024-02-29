<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-12',
                'stok_jumlah' => 100,
            ],
            [
                'barang_id' => 2,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-15',
                'stok_jumlah' => 150,
            ],
            [
                'barang_id' => 3,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-18',
                'stok_jumlah' => 200,
            ],
            [
                'barang_id' => 4,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-20',
                'stok_jumlah' => 120,
            ],
            [
                'barang_id' => 5,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-12',
                'stok_jumlah' => 80,
            ],
            [
                'barang_id' => 6,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-22',
                'stok_jumlah' => 90,
            ],
            [
                'barang_id' => 7,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-13',
                'stok_jumlah' => 110,
            ],
            [
                'barang_id' => 8,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-19',
                'stok_jumlah' => 130,
            ],
            [
                'barang_id' => 9,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-20',
                'stok_jumlah' => 180,
            ],
            [
                'barang_id' => 10,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-10',
                'stok_jumlah' => 150,
            ],
        ];

        DB::table('t_stoks')->insert($data);

    }
}
