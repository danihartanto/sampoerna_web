<?php

namespace App\Http\Controllers;

use App\Models\JenisModel;
use Illuminate\Http\Request;

class MasterdataController extends Controller
{
    public function jenis_index()
    {
        $posts = JenisModel::all();
        // dd($barangs);
        // $posts = BarangModel::latest()->paginate(5);

        //render view with posts
        return view('masterdata.jenis_index', compact('posts'));
        // return view('barang/index', $data);
    }

    public function jenis_add()
    {
        $posts = JenisModel::all(); 
        return view('masterdata.jenis_add', compact('posts'));
        // return view('barang.add');
    }
    public function jenis_add_proses(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_jenis'     => 'required',
            'kode_jenis'     => 'required',
        ]);

        JenisModel::create([
            'nama_jenis'     => $request->nama_jenis,
            'kode_jenis'     => $request->kode_jenis,
        ]);

        return redirect()->to('/master/jenis')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function jenis_edit(string $id)
    {
        //get post by ID
        $post = JenisModel::findOrFail($id);

        //render view with post
        return view('masterdata.jenis_edit', compact('post'));
    }
    public function jenis_update(Request $request, $id)
    {

        JenisModel::where('id', $id)->update([
            'nama_jenis'     => $request->nama_jenis,
            'kode_jenis'     => $request->kode_jenis,
        ]);

        // return view('barang.index');
        //redirect to index
        return redirect()->to('/master/jenis')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function jenis_destroy($id)
    {
        //get post by ID
        $post = JenisModel::find($id);
        $post->delete();

        //redirect to index
        return redirect()->to('/master/jenis')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
