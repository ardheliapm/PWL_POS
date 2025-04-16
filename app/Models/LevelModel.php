<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;
    protected $table = 'm_level'; // Ganti dengan nama tabel level yang benar
    protected $primaryKey = 'level_id';
    
    protected $fillable = ['level_kode', 'level_nama'];
}
