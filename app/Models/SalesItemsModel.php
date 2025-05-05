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
        'qty',
        'harga_satuan',
        'created_by',
        // 'warehouse_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function sales()
    {
        return $this->belongsTo(SalesModel::class);
    }
    public function barangs()
    {
        return $this->belongsTo(BarangModel::class);
    }
}
