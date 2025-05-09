<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SalesItemsModel;
use App\Models\SalesModel;
use App\Models\WarehouseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
        ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        // Misal verifikasi manual:
        $user = User::where('email', $credentials['email'])->first();

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            session()->put('user_id', $user->id);
            session()->put('fullname', $user->full_name);
            session()->put('username', $user->username);
            session()->put('email', $user->email);
            return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 
    
    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            $warehouse_count = WarehouseModel::count();
            $penjualan_count = SalesItemsModel::count();
            $customer_count = SalesModel::count();
            $totalQty = SalesItemsModel::sum('qty');

            // $salesData = DB::table('sales')
            //     ->select(DB::raw('DATE(tanggal_jual) as tanggal_jual'), DB::raw('SUM(total) as total'))
            //     ->groupBy(DB::raw('DATE(tanggal_jual)'))
            //     ->orderBy('tanggal_jual')->get();
            $salesData = SalesItemsModel::with('barangs')
                ->select('barang_id', DB::raw('SUM(total) as total'))
                ->groupBy('barang_id')
                ->get()
                ->map(function ($item) {
                    return [
                        'nama_barang' => $item->barangs->nama_barang ?? 'Tidak Diketahui',
                        'total' => $item->total
                    ];
            });
            
            $salesData2 = DB::table('sales_items')
            ->select(DB::raw('DATE(tanggal_jual) as tanggal'), 'total')
            ->orderBy('tanggal_jual')
            ->get();

            $salesData3 = DB::table('sales_items')
                ->selectRaw('DATE(tanggal_jual) as tanggal, SUM(total) as total')
                ->groupByRaw('DATE(tanggal_jual)')
                ->orderByRaw('DATE(tanggal_jual)')
            ->get();
            
            $data_stok = DB::table('barang')
            ->leftJoin('sales_items', 'barang.id', '=', 'sales_items.barang_id')
            ->select('barang.nama_barang', 'barang.stok', DB::raw('COALESCE(SUM(sales_items.qty), 0) as qty_terjual'))
            ->groupBy('barang.id', 'barang.nama_barang', 'barang.stok')
            ->get();
            // dd($data_stok);

            $labels_stok = $data_stok->pluck('nama_barang');
            $stok = $data_stok->pluck('stok');
            $qtyTerjual = $data_stok->pluck('qty_terjual');

            $line_labels = $salesData3->pluck('tanggal'); // ['2025-05-01', '2025-05-02', ...]
            $line_values = $salesData3->pluck('total');   // [100000, 200000, ...]

            // dd($salesData2);
            $labels = $salesData->pluck('nama_barang');
            $values = $salesData->pluck('total');
            // $line_labels = $salesData2->pluck('tanggal');
            // $line_values = $salesData2->pluck('total');
            // dd($warehouse_count);
            return view('dashboard', compact('warehouse_count','penjualan_count','customer_count','totalQty','labels','values','line_labels','line_values','labels_stok', 'stok', 'qtyTerjual'));
            // return view('dashboard');
            // return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    
    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }    

}
