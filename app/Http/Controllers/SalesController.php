<?php

namespace App\Http\Controllers;

use App\Models\SalesModel;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() {
        $posts = SalesModel::with('users')->get();
        dd($posts);
        // $posts = BarangModel::latest()->paginate(5);

        //render view with posts
        return view('sales.index', compact('posts'));
        // return view('barang/index', $data);
    }
}
