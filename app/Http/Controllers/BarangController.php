<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BarangController extends Controller
{
    public function index()
    {
        $posts = BarangModel::latest()->paginate(5);

        //render view with posts
        return view('barang.index', compact('posts'));
        // return view('barang/index', $data);
    }

    public function add()
    {
        return view('barang.add');
    }
    public function add_proses(Request $request)
    {
        // dd($request);
        //validate form
        // $this->validate($request, [
        //     'name'     => 'required',
        //     'kode'     => 'required|min:3',
        // ]);

        //upload image
        
        //create post
        // dd($request);
        BarangModel::create([
            'nama_barang'     => $request->nama_barang,
            'kode'     => $request->kode,
            'jenis'   => $request->jenis,
            'jumlah'   => $request->jumlah,
            'satuan'   => $request->satuan,
            'pic'   => $request->pic
        ]);

        // return view('barang.index');
        return redirect()->to('/barang')->with(['success' => 'Data Berhasil Disimpan!']);
        //redirect to index
        // return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function list_fetch()
    {
        $postModel = new BarangModel();
        $posts = $postModel->all();
        // $posts = $postModel->getDataByIdKategori("DECO")->getResultArray();
        $data = '';

        if ($posts) {
            foreach ($posts as $post) {
                $harga = number_format($post['harga_paket'],0);
                $data .= '
                <div class="col-lg-4 mt-lg-2 mt-sm-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-card">
                        <h3>' . $post['name'] . '</h3>
                        <div class="price">
                            <span class="currency">Rp. </span>
                            <span class="amount">' . $post['kode'] . '</span>
                            <span class="period">/ package</span>
                        </div>
                        
                    
                        <a href="#" id="' . $post['id'] . '" data-bs-toggle="modal" data-bs-target="#detail_post_modal" class="btn btn-primary btn-sm post_detail_btn">
                            Booking Now
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>';
            }
            return Response::json([
                'error' => false,
                'message' => $data
            ], 201); // Status code here
        } else {
            return Response::json([
                'error' => false,
                'message' => '<div class="text-secondary text-center fw-bold my-5">No posts found in the database!</div>'
            ]);
        }
    }
    public function edit(string $id)
    {
        //get post by ID
        $post = BarangModel::findOrFail($id);

        //render view with post
        return view('barang.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        //validate form
        // $this->validate($request, [
        //     'name'     => 'required',
        //     'kode'     => 'required|min:3',
        // ]);

        //upload image
        
        //create post
        // dd($request);
        // $post = BarangModel::find($id);
        // dd($request);
        BarangModel::where('id', $id)->update([
            'nama_barang'     => $request->nama_barang,
            // 'kode'     => $request->kode,
            'jenis'   => $request->jenis,
            'jumlah'   => $request->jumlah,
            'satuan'   => $request->satuan,
            'pic'   => $request->pic
        ]);

        // return view('barang.index');
        //redirect to index
        return redirect()->to('/barang')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        //get post by ID
        $post = BarangModel::find($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->to('/barang')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
