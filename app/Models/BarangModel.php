<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'satuan',
        'stok',
        'warehouse_id',
    ];

    public function warehouse()
    {
        return $this->belongsTo(WarehouseModel::class);
    }
    public function salesitems()
    {
        return $this->hasMany(SalesItemsModel::class);
    }
    // protected $table = 'barang';
    // protected $primaryKey = 'id';
    // use HasFactory;
    // protected $fillable = [
    //     'nama_barang',
    //     'kode',
    //     'jenis',
    //     'jumlah',
    //     'satuan',
    //     'pic',
    //     'created_at',
    //     'updated_at'
    // ];
}
