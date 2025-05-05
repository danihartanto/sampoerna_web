<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    
    protected $table = 'sales';

    protected $fillable = [
        'sales_number',
        'customer',
        'tanggal_jual',
        'created_by',
        // 'warehouse_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function salesitems()
    {
        return $this->hasMany(SalesItemsModel::class);
    }
}
