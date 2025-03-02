<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(){
        // DB::insert('insert into m_level(level_kode,level_nama,created_at) value(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return "Data Level Berhasil Ditambahkan";

        $exists = DB::select('SELECT * FROM m_level WHERE level_kode = ?', ['PELGN']);

        /* $row = DB::update('UPDATE m_level SET level_nama = ?, updated_at = NOW() WHERE level_kode = ?', ['Customer', 'CUS']);
        if ($row) {
            return "Data Level Berhasil Diubah";
        } else {
            return "Tidak ada data yang diubah. Periksa level_kode.";
        }
            */

        //$row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        //return 'Delete data berhasil. Jumlah baris data yang dihapus :  ' . $row. 'baris' ;

        $data = DB::select('select * from m_level');
        return view('level' , ['data' => $data]);


        
    }
}
