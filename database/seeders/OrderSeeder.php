<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderModel;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        OrderModel::create([
            'po_number' => 'PO001',
            'supplier' => 'PT Elektronik Sejahtera',
            'tanggal_po' => now()->subDays(3),
            'created_by' => 1, // pastikan user dengan ID 1 sudah ada
        ]);
    }
}
