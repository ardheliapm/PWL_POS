<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Administrator
            [
                'level_id'  => 1, 
                'username'  => 'admin',
                'nama'      => 'Administrator',
                'password'  => Hash::make('admin123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],

            // Manager
            [
                'level_id'  => 2, 
                'username'  => 'manager',
                'nama'      => 'Manager Satu',
                'password'  => Hash::make('manager123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 2, 
                'username'  => 'manager2',
                'nama'      => 'Manager Dua',
                'password'  => Hash::make('manager123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],

            // User
            [
                'level_id'  => 3, 
                'username'  => 'della',
                'nama'      => 'Ardhelia Putri',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3, 
                'username'  => 'arya',
                'nama'      => 'Arya Putra',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3,
                'username'  => 'michael',
                'nama'      => 'Michael Johnson',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3,
                'username'  => 'alice',
                'nama'      => 'Alice Brown',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3,
                'username'  => 'robert',
                'nama'      => 'Robert Wilson',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3,
                'username'  => 'emily',
                'nama'      => 'Emily Davis',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3,
                'username'  => 'daniel',
                'nama'      => 'Daniel Martinez',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3,
                'username'  => 'sophia',
                'nama'      => 'Sophia Anderson',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 2,
                'username'  => 'william',
                'nama'      => 'William Thomas',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'level_id'  => 3,
                'username'  => 'olivia',
                'nama'      => 'Olivia Garcia',
                'password'  => Hash::make('password123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],

            // Kasir (Baru Ditambahkan)
            [
                'level_id'  => 4,
                'username'  => 'kasir1',
                'nama'      => 'Kasir Satu',
                'password'  => Hash::make('kasir123'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
        ];

        // Masukkan data ke tabel
        DB::table('m_user')->insert($users);
}}
