<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['level_id' => 1, 'level_kode' => 'ADM', 'level_nama' => 'Administrator'],
            ['level_id' => 2, 'level_kode' => 'MNG', 'level_nama' => 'Manager'],
            ['level_id' => 3, 'level_kode' => 'USR', 'level_nama' => 'User'],
            ['level_id' => 4, 'level_kode' => 'KSR', 'level_nama' => 'Kasir'],
        ];

        foreach ($data as $row) {
            DB::table('m_level')->updateOrInsert(
                ['level_id' => $row['level_id']], // Pastikan level_id sesuai urutan
                ['level_kode' => $row['level_kode'], 'level_nama' => $row['level_nama']]
            );
        }
    }
}
