<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItemsModel extends Model
{
    use HasFactory;
    protected $table = 'sales_items';

    protected $fillable = [
        'sales_id',
        'barang_id',
        'nomor_fak',
        'qty',
        'harga_satuan',
        'total',
        'tanggal_jual',
        'created_by',
        // 'warehouse_id',
    ];

    // protected static function booted()
    // {
    //     static::created(function ($salesItem) {
    //         $barang = BarangModel::find($salesItem->barang_id);
    //         if ($barang) {
    //             $barang->decrement('stok', $salesItem->qty);
    //         }
    //     });
    // }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function sales()
    {
        return $this->belongsTo(SalesModel::class,'sales_id');
    }
    public function barangs()
    {
        return $this->belongsTo(BarangModel::class,'barang_id');
    }
    
}
