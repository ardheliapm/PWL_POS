<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
       

        // Masukkan 10 data stok barang baru
        DB::table('t_stok')->insert([
            [
                'stok_id' => 1,
                'barang_id' => 1, // Laptop
                'user_id' => 1, // Admin/User yang menginput
                'stok_tanggal' => now(),
                'stok_jumlah' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2, // Smartphone
                'user_id' => 1,
                'stok_tanggal' => now(),
                'stok_jumlah' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3, // Kemeja Pria
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4, // Celana Jeans
                'user_id' => 2,
                'stok_tanggal' => now(),
                'stok_jumlah' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5, // Mie Instan
                'user_id' => 3,
                'stok_tanggal' => now(),
                'stok_jumlah' => 100,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6, // Susu UHT
                'user_id' => 3,
                'stok_tanggal' => now(),
                'stok_jumlah' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 7,
                'barang_id' => 7, // Sepatu Sneakers
                'user_id' => 4,
                'stok_tanggal' => now(),
                'stok_jumlah' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8, // Sandal Gunung
                'user_id' => 4,
                'stok_tanggal' => now(),
                'stok_jumlah' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9, // Jam Tangan
                'user_id' => 5,
                'stok_tanggal' => now(),
                'stok_jumlah' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'stok_id' => 10,
                'barang_id' => 10, // Tas Ransel
                'user_id' => 5,
                'stok_tanggal' => now(),
                'stok_jumlah' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
