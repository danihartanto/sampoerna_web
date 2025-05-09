<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\SalesItemsModel;
use App\Models\SalesModel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        // $posts = SalesModel::with('users')->get();
        $posts = SalesModel::with('user')->get();
        // dd($sales);
        // $posts = BarangModel::latest()->paginate(5);

        //render view with posts
        return view('customer.index', compact('posts'));
        // return view('barang/index', $data);
    }
    public function add()
    {
        $sales = SalesModel::all(); 
        $barang = BarangModel::all(); 
        $salesitems = SalesItemsModel::with('barangs')->get();
        // dd($salesitems);
        return view('customer.add', compact('salesitems','sales','barang'));
        // return view('barang.add');
    }

    public function add_proses(Request $request)
    {
        //validate form
        $this->validate($request, [
            // 'sales_number'     => 'required',
            'customer'     => 'required',
        ]);

        $customers = SalesModel::create([
            // 'sales_number'     => $request->sales_number,
            'customer'     => $request->customer,
            'created_by'   => session()->get('user_id'),
        ]);
        $customers->sales_number = 'C' . str_pad($customers->id, 5, '0', STR_PAD_LEFT);
        $customers->save();

        return redirect()->to('/customer')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        //get post by ID
        $post = SalesModel::findOrFail($id);

        //render view with post
        return view('customer.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {

        SalesModel::where('id', $id)->update([
            'sales_number'     => $request->sales_number,
            'customer'     => $request->customer,
            'created_by'   => session()->get('user_id'),
        ]);

        // return view('barang.index');
        //redirect to index
        return redirect()->to('/customer')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function destroy($id)
    {
        //get post by ID
        $post = SalesModel::find($id);
        $post->delete();

        //redirect to index
        return redirect()->to('/customer')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
