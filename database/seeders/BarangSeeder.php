<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
        // Hapus data tanpa truncate agar tidak terkena foreign key constraint
        DB::table('m_barang')->delete();

        // Masukkan 10 data barang baru
        DB::table('m_barang')->insert([
            [
                'barang_id' => 1,
                'kategori_id' => 1, 
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop',
                'harga_beli' => 9000000,
                'harga_jual' => 10000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1, 
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 4500000,
                'harga_jual' => 5000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2, 
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Kemeja Pria',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2, 
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Celana Jeans',
                'harga_beli' => 300000,
                'harga_jual' => 350000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3, 
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Mie Instan',
                'harga_beli' => 3000,
                'harga_jual' => 3500,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3, 
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Susu UHT',
                'harga_beli' => 12000,
                'harga_jual' => 15000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4, 
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Sepatu Sneakers',
                'harga_beli' => 700000,
                'harga_jual' => 750000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4, 
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Sandal Gunung',
                'harga_beli' => 180000,
                'harga_jual' => 200000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5, 
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Jam Tangan',
                'harga_beli' => 1300000,
                'harga_jual' => 1500000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5, 
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Tas Ransel',
                'harga_beli' => 450000,
                'harga_jual' => 500000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
