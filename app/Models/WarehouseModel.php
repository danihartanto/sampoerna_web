<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseModel extends Model
{
    protected $table = 'warehouse';
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable = [
        'nama',
        'kode',
        'lokasi',
        'kapasitas',
        'telepon',
        'created_at',
        'updated_at'
    ];
}
