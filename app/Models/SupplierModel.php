<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierModel extends Model
{
    use HasFactory;

    protected $table = 'm_supplier'; // nama tabel di database
    protected $primaryKey = 'supplier_id'; // ganti dengan primary key yang sesuai
    protected $fillable = [
        'supplier_kode',
        'supplier_nama',
        'supplier_alamat',  // Tambahkan alamat
        'supplier_telp',    // Tambahkan telepon
    ];
}