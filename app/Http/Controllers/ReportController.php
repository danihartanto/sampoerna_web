<?php

namespace App\Http\Controllers;

use App\Models\SalesItemsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        $salesdata = SalesItemsModel::select(
            'barang_id',
            DB::raw('SUM(total) as total'),
            DB::raw('SUM(qty) as qty')
        )
        ->groupBy('barang_id')
        ->orderByDesc('total') // Urutkan dari penjualan terbesar
        ->get()
        ->map(function ($item) {
            return [
                'nama_barang' => $item->barangs->nama_barang ?? 'Tidak Diketahui',
                'total' => $item->total,
                'qty' => $item->qty
            ];
        });
        $salesdata2 = SalesItemsModel::select(
            'sales_id',
            DB::raw('SUM(total) as total'),
            DB::raw('SUM(qty) as qty')
        )
        ->groupBy('sales_id')
        ->orderByDesc('total') // Urutkan dari penjualan terbesar
        ->get()
        ->map(function ($item) {
            return [
                'customer' => $item->sales->customer ?? 'Tidak Diketahui',
                'total' => $item->total,
                'qty' => $item->qty
            ];
        });

        $salesdata3 = DB::table('barang')
                ->leftJoin('sales_items', 'barang.id', '=', 'sales_items.barang_id')
                ->select('barang.nama_barang as nama_barang', 'barang.stok as stok', DB::raw('COALESCE(SUM(sales_items.qty), 0) as qty_terjual'))
                ->groupBy('barang.id', 'barang.nama_barang', 'barang.stok')
                ->orderByDesc('stok')
                ->get()
                ->map(function ($item) {
            return [
                'nama_barang' => $item->nama_barang ?? 'Tidak Diketahui',
                'stok' => $item->stok,
                'qty' => $item->qty_terjual
            ];
        });
        // dd($salesdata3);
        $posts = SalesItemsModel::with('user','barangs','sales')->get();
        return view('report.index', compact('posts','salesdata','salesdata2','salesdata3'));
        // return view('report.index');
    }
}
