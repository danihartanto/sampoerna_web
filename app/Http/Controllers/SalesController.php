<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\SalesItemsModel;
use App\Models\SalesModel;
use App\Models\SatuanModel;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SalesController extends Controller
{
    public function index() {
        // $posts = SalesModel::with('users')->get();
        $posts = SalesItemsModel::with('user','barangs','sales')->get();
        // dd($posts[0]->qty);
        // $posts['total'] = $posts->qty*5;

        //render view with posts
        return view('sales.index', compact('posts'));
        // return view('barang/index', $data);
    }
    public function add()
    {
        $customer = SalesModel::all(); 
        $barang = BarangModel::all(); 
        $salesitems = SalesItemsModel::with('barangs')->get();
        // dd($salesitems);
        return view('sales.add', compact('salesitems','customer','barang'));
        // return view('barang.add');
    }

    public function add_proses(Request $request)
    {
        //validate form
        $this->validate($request, [
            'sales_id'     => 'required',
            'barang_id'     => 'required',
        ]);

        $barang_kode = BarangModel::find($request->barang_id);
        $datenow = 
        $sale = SalesItemsModel::create([
            'sales_id'     => $request->sales_id,
            'barang_id'     => $request->barang_id,
            'qty'           => $request->qty,
            'harga_satuan'  => $request->harga_satuan,
            'tanggal_jual'  =>$request->tanggal_jual,
            'created_by'   => session()->get('user_id'),
        ]);
        $barang = BarangModel::find($request->barang_id);
        if ($barang->stok < $request->qty) {
            return response()->json(['error' => 'Stok tidak cukup'], 400);
        } else{
            if ($barang) {
                $barang->decrement('stok', $request->qty);
            }
        }
        $sale->nomor_fak = 'INV' . str_pad($sale->id, 5, '0', STR_PAD_LEFT);
        $sale->total = $request->qty*$request->harga_satuan;
        $sale->save();
        // $barang = BarangModel::find($request->barang_id);
        // if ($barang) {
        //     $barang->decrement('stok', $request->qty);
        // }

        return redirect()->to('/sales')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Request $request, $id)
    {
        //get post by ID
        $barangs = BarangModel::all();
        $post = SalesItemsModel::findOrFail($id);
        $sales = SalesModel::all();
        $warehouses = WarehouseModel::all(); 
        // dd($post);

        //render view with post
        return view('sales.edit', compact('post','warehouses','barangs','sales'));
        //get post by ID

        //render view with post
        // return view('sales.edit', compact('post'));
    }

    public function edits(Request $request, $id)
    {
        //get post by ID
        $barangs = BarangModel::findOrFail($id);
        $post = SalesItemsModel::findOrFail($id);
        $warehouses = WarehouseModel::all(); 
        dd($post);

        //render view with post
        return view('sales.edit', compact('post','warehouses','barangs'));
        //get post by ID

        //render view with post
        // return view('sales.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {

        

        $item = SalesItemsModel::findOrFail($id);
        $barang = BarangModel::findOrFail($request->barang_id);

        $oldQty = $item->qty;
        $newQty = $request->qty;
        $oldBarang = BarangModel::findOrFail($item->barang_id);
        $newBarang = BarangModel::findOrFail($request->barang_id);

        // ======== CASE: barang_id TIDAK berubah ========
        if ($item->barang_id == $request->barang_id) {
            if ($newQty < $oldQty) {
                // Kembalikan stok ke barang lama
                $restore = $oldQty - $newQty;
                $oldBarang->increment('stok', $restore);
            } elseif ($newQty > $oldQty) {
                $reduce = $newQty - $oldQty;
                if ($oldBarang->stok < $reduce) {
                    // return response()->json(['error' => 'Stok tidak cukup'], 400);
                    // return redirect()->to('/sales/edit/' . $id)->with(['error' => 'Stok baru tidak cukup!']);
                    return redirect()->to('/sales/edit/' . $id)->with(['error' => 'Stok baru tidak cukup! Stok tersedia hanya '.$barang->stok.' '.$barang->satuan]);
                }
                $oldBarang->decrement('stok', $reduce);
            }
        }

        // ======== CASE: barang_id BERUBAH ========
        else {
            // Kembalikan stok dari barang lama
            $oldBarang->increment('stok', $oldQty);
            // Cek stok barang baru sebelum dikurangi
            if ($newBarang->stok < $newQty) {
                // return response()->json(['error' => 'Stok barang baru tidak cukup   '], 400);
                return redirect()->to('/sales/edit/' . $id)->with(['error' => 'Stok baru tidak cukup! Stok tersedia hanya '.$barang->stok.' '.$barang->satuan]);
            }

            // Kurangi stok dari barang baru
            $newBarang->decrement('stok', $newQty);
        }

        $harga_total = number_format($request->qty*$request->harga_satuan, 2, '.', '');
        SalesItemsModel::where('id', $id)->update([
            'sales_id'     => $request->sales_id,
            'barang_id'     => $request->barang_id,
            'qty'           => $request->qty,
            'harga_satuan'  => $request->harga_satuan,
            'total'         => $harga_total,
            'tanggal_jual'  =>$request->tanggal_jual,
            'created_by'   => session()->get('user_id'),
        ]);
        
        // $sale->save();

        //redirect to index
        return redirect()->to('/sales')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function destroy($id)
    {
        //get post by ID
        $post = SalesItemsModel::find($id);
        $post->delete();

        //redirect to index
        return redirect()->to('/sales')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
