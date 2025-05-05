<?php

// namaspace Database\Seeders;
namespace Database\Seeders;

use App\Models\WarehouseModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WarehouseModel::create([
            'nama' => 'Gudang Pusat',
            'kode' => 'WH001',
            'lokasi' => 'Jakarta',
            'kapasitas' => 1000,
            'telepon' => '0096'
        ]);
        WarehouseModel::create([
            'nama' => 'Gudang Bandung',
            'kode' => 'WH002',
            'lokasi' => 'Bandung',
            'kapasitas' => 1000,
            'telepon' => '0096'
        ]);
        WarehouseModel::create([
            'nama' => 'Gudang Surabaya',
            'kode' => 'WH003',
            'lokasi' => 'Surabaya',
            'kapasitas' => 1000,
            'telepon' => '0096'
        ]);
            
    }
}
