<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'kode',
        'jenis',
        'jumlah',
        'satuan',
        'pic',
        'created_at',
        'updated_at'
    ];
}
