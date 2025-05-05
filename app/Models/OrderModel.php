<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'po_number',
        'supplier',
        'tanggal_po',
        'created_by',
    ];

    public function items()
    {
        return $this->hasMany(OrderItemsModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
