<?php

namespace Database\Seeders;

use App\Models\SalesItemsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalesItemsModel::insert([
            [
                'sales_id' => 1,
                'barang_id' => 3, // pastikan barang ID 1 ada
                'qty' => 2,
                'harga_satuan' => 250000,
                'tanggal_jual' => now(),
                'created_by' => 1
            ],
            [
                'sales_id' => 2,
                'barang_id' => 4,
                'qty' => 1,
                'harga_satuan' => 1000000,
                'tanggal_jual' => now(),
                'created_by' => 2
            ],
        ]);
    }
}
