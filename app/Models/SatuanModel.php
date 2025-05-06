<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanModel extends Model
{
    use HasFactory;
    protected $table = 'satuan';

    protected $fillable = [
        'nama_satuan',
        'kode_satuan'
        // 'warehouse_id',
    ];
}
