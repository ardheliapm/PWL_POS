<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        DB::table('t_penjualan')->insert([
            [
                'user_id' => 1,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'TRX001',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Jane Smith',
                'penjualan_kode' => 'TRX002',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Michael Johnson',
                'penjualan_kode' => 'TRX003',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'pembeli' => 'Alice Brown',
                'penjualan_kode' => 'TRX004',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'pembeli' => 'Robert Wilson',
                'penjualan_kode' => 'TRX005',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 6,
                'pembeli' => 'Emily Davis',
                'penjualan_kode' => 'TRX006',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 7,
                'pembeli' => 'Daniel Martinez',
                'penjualan_kode' => 'TRX007',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 8,
                'pembeli' => 'Sophia Anderson',
                'penjualan_kode' => 'TRX008',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 9,
                'pembeli' => 'William Thomas',
                'penjualan_kode' => 'TRX009',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 10,
                'pembeli' => 'Olivia Garcia',
                'penjualan_kode' => 'TRX010',
                'penjualan_tanggal' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
