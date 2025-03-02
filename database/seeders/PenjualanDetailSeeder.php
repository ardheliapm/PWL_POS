<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run()
    {
        // Misalkan ada 10 transaksi penjualan
        for ($i = 1; $i <= 10; $i++) {
            // Setiap transaksi memiliki 3 barang
            for ($j = 1; $j <= 3; $j++) {
                DB::table('t_penjualan_detail')->insert([
                    'penjualan_id' => $i,
                    'barang_id' => rand(1, 10), // Misal barang_id dari 1 sampai 10
                    'harga' => rand(5000, 50000), // Harga random
                    'jumlah' => rand(1, 5), // Jumlah random
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
