<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Transaksi 1
            [
                'penjualan_id' => 1,
                'barang_id' => 1,
                'harga' => 75000, // Harga jual Kemeja Putih
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 2,
                'harga' => 100000, // Harga jual Celana Jeans
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 5,
                'harga' => 1500000, // Harga jual Cincin Berlian
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],

            // Transaksi 2
            [
                'penjualan_id' => 2,
                'barang_id' => 7,
                'harga' => 200000, // Harga jual Panci Stainless
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 9,
                'harga' => 400000, // Harga jual Sepatu Lari
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 4,
                'harga' => 4000000, // Harga jual Smartphone
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

            // Transaksi 3
            [
                'penjualan_id' => 3,
                'barang_id' => 8,
                'harga' => 200000, // Harga jual Set Peralatan Makan
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 3,
                'barang_id' => 6,
                'harga' => 3000000, // Harga jual Kalung Emas
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 3,
                'barang_id' => 10,
                'harga' => 400000, // Harga jual Bola Basket
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

            // Transaksi 4
            [
                'penjualan_id' => 4,
                'barang_id' => 8,
                'harga' => 200000, // Harga jual Set Peralatan Makan
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 4,
                'barang_id' => 6,
                'harga' => 3000000, // Harga jual Kalung Emas
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 4,
                'barang_id' => 10,
                'harga' => 400000, // Harga jual Bola Basket
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

            // Transaksi 5
            [
                'penjualan_id' => 5,
                'barang_id' => 8,
                'harga' => 200000, // Harga jual Set Peralatan Makan
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 6,
                'harga' => 3000000, // Harga jual Kalung Emas
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 5,
                'barang_id' => 10,
                'harga' => 400000, // Harga jual Bola Basket
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],
            // Transaksi 6
            [
                'penjualan_id' => 6,
                'barang_id' => 1,
                'harga' => 75000, // Harga jual Kemeja Putih
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 6,
                'barang_id' => 2,
                'harga' => 100000, // Harga jual Celana Jeans
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 6,
                'barang_id' => 5,
                'harga' => 1500000, // Harga jual Cincin Berlian
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

            // Transaksi 7
            [
                'penjualan_id' => 7,
                'barang_id' => 7,
                'harga' => 200000, // Harga jual Panci Stainless
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 7,
                'barang_id' => 9,
                'harga' => 400000, // Harga jual Sepatu Lari
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 7,
                'barang_id' => 4,
                'harga' => 4000000, // Harga jual Smartphone
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

            // Transaksi 8
            [
                'penjualan_id' => 8,
                'barang_id' => 7,
                'harga' => 200000, // Harga jual Panci Stainless
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 8,
                'barang_id' => 9,
                'harga' => 400000, // Harga jual Sepatu Lari
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 8,
                'barang_id' => 4,
                'harga' => 4000000, // Harga jual Smartphone
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

            // Transaksi 9
            [
                'penjualan_id' => 9,
                'barang_id' => 7,
                'harga' => 200000, // Harga jual Panci Stainless
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 9,
                'barang_id' => 9,
                'harga' => 400000, // Harga jual Sepatu Lari
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 9,
                'barang_id' => 4,
                'harga' => 4000000, // Harga jual Smartphone
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

            // Transaksi 10
            [
                'penjualan_id' => 10,
                'barang_id' => 7,
                'harga' => 200000, // Harga jual Panci Stainless
                'jumlah' => 2, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 10,
                'barang_id' => 9,
                'harga' => 400000, // Harga jual Sepatu Lari
                'jumlah' => 3, // Jumlah barang yang dibeli
            ],
            [
                'penjualan_id' => 10,
                'barang_id' => 4,
                'harga' => 4000000, // Harga jual Smartphone
                'jumlah' => 1, // Jumlah barang yang dibeli
            ],

        ];

        DB::table('t_penjualan_details')->insert($data);
    }
}
