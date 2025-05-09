<?php

namespace App\Http\Controllers;

use App\Models\SalesItemsModel;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $warehouse_count = WarehouseModel::count();
        dd($warehouse_count);
        return view('dashboard', compact('warehouse_count'));
    }
    public function getChartData($jenis)
    {
        
        if ($jenis == "stackedbar") {
            $data = DB::table('barang')
                ->leftJoin('sales_items', 'barang.id', '=', 'sales_items.barang_id')
                ->select('barang.nama_barang', 'barang.stok', DB::raw('COALESCE(SUM(sales_items.qty), 0) as qty_terjual'))
                ->groupBy('barang.id', 'barang.nama_barang', 'barang.stok')
                ->get();
            $jenis = response()->json([
                'labels' => $data->pluck('nama_barang'),
                'stok' => $data->pluck('stok'),
                'terjual' => $data->pluck('qty_terjual'),
            ]);
        } elseif ($jenis == "barchart") {
            $salesData = SalesItemsModel::with('barangs')
                ->select('barang_id', DB::raw('SUM(qty) as total'))
                ->groupBy('barang_id')
                ->get()
                ->map(function ($item) {
                    return [
                        'nama_barang' => $item->barangs->nama_barang ?? 'Tidak Diketahui',
                        'total' => $item->total
                    ];
            });
            $jenis = response()->json([
                'labels' => $salesData->pluck('nama_barang'),
                'values' => $salesData->pluck('total'),
                // 'terjual' => $data->pluck('qty_terjual'),
            ]);
            // $labels = $salesData->pluck('nama_barang');
            // $values = $salesData->pluck('total');
        } elseif ($jenis == "linechart") {
            $salesData3 = DB::table('sales_items')
                ->selectRaw('DATE(tanggal_jual) as tanggal, SUM(qty) as total')
                ->groupByRaw('DATE(tanggal_jual)')
                ->orderByRaw('DATE(tanggal_jual)')
            ->get();
            $jenis = response()->json([
                'labels' => $salesData3->pluck('tanggal'),
                'values' => $salesData3->pluck('total'),
            ]);
            // dd($jenis);
        }
        return $jenis; 
    }
}
