<?php

namespace App\Http\Controllers;

use App\Models\WarehouseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WarehouseController extends Controller
{
    public function index()
    {
        $posts = WarehouseModel::latest()->paginate(5);

        //render view with posts
        return view('warehouse.index', compact('posts'));
        // return view('warehouse/index', $data);
    }

    public function add()
    {
        return view('warehouse.add');
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
        WarehouseModel::create([
            'nama'     => $request->nama,
            'kode'     => $request->kode,
            'lokasi'   => $request->lokasi,
            'kapasitas'   => $request->kapasitas,
            'telepon'   => $request->telepon
        ]);

        // return view('warehouse.index');
        return redirect()->to('/warehouse')->with(['success' => 'Data Berhasil Disimpan!']);
        //redirect to index
        // return redirect()->route('warehouse.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function list_fetch()
    {
        $postModel = new WarehouseModel();
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
        $post = WarehouseModel::findOrFail($id);

        //render view with post
        return view('warehouse.edit', compact('post'));
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
        // $post = WarehouseModel::find($id);
        // dd($request);
        WarehouseModel::where('id', $id)->update([
            'nama'     => $request->nama,
            'kode'     => $request->kode,
            'lokasi'   => $request->lokasi,
            'kapasitas'   => $request->kapasitas,
            'telepon'   => $request->telepon
        ]);

        // return view('warehouse.index');
        //redirect to index
        return redirect()->to('/warehouse')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($id)
    {
        //get post by ID
        $post = WarehouseModel::find($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->to('/warehouse')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
