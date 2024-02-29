<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 3,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => '2024-02-27',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Jane Smith',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => '2024-02-26',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Alice Johnson',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => '2024-02-26',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Bob Brown',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => '2024-02-27',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Emily Davis',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => '2024-02-27',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Michael Wilson',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => '2024-02-25',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Sophia Martinez',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => '2024-02-24',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Olivia Taylor',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => '2024-02-25',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'James Anderson',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => '2024-02-26',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'William White',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => '2024-02-25',
            ],
        ];

        DB::table('t_penjualans')->insert($data);
    }
}
