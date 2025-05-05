<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sales;
use App\Models\SalesItem;
use App\Models\SalesItemsModel;
use App\Models\SalesModel;

class SalesSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh satu data penjualan
        $sales = SalesModel::create([
            'tanggal_jual' => now(),
            'customer' => 'PT Sukses Makmur',
            'sales_number' => 001,
            'created_by' => 1 // pastikan user ID 1 ada
        ]);

        // Detail barang yang dijual
        SalesItemsModel::insert([
            [
                'sales_id' => $sales->id,
                'barang_id' => 1, // pastikan barang ID 1 ada
                'qty' => 2,
                'harga_satuan' => 250000,
                'created_by' => 1
                // 'subtotal' => 500000
            ],
            [
                'sales_id' => $sales->id,
                'barang_id' => 2,
                'qty' => 1,
                'harga_satuan' => 1000000,
                'created_by' => 1
                // 'subtotal' => 1000000
            ],
        ]);
    }
}
