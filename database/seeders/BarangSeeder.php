<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Barang;
use App\Models\BarangModel;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        BarangModel::create([
            'kode_barang' => 'BRG001',
            'nama_barang' => 'Kabel LAN 10m',
            'satuan' => 'pcs',
            'stok' => 50,
            'warehouse_id' => 1, // pastikan warehouse dengan ID 1 sudah ada
        ]);

        BarangModel::create([
            'kode_barang' => 'BRG002',
            'nama_barang' => 'Mouse Wireless',
            'satuan' => 'pcs',
            'stok' => 30,
            'warehouse_id' => 1,
        ]);
    }
}
