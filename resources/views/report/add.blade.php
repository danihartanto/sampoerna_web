@extends('./template.layouts')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Penjualan</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
    <section class="content">
        <div class="">
          <div class="">
            <div class="row justify-content-center mt-2">
              <div class="col-md-10">
                  <div class="card">
                      <div class="card-header">Tambah Data Penjualan</div>
                      <div class="card-body">
                            <form action="{{ route('sales_add_proses') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="barang" class="col-md-4 col-form-label text-md-end text-start">ID Customer</label>
                                    <div class="col-md-6">
                                        <select name="sales_id" class="form-control"  required>
                                            <option value="">-- Pilih Customer --</option>
                                            @foreach ($customer as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->sales_number." - ".$item->customer }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="barang" class="col-md-4 col-form-label text-md-end text-start">Items Barang</label>
                                    <div class="col-md-6">
                                        <select name="barang_id" class="form-control"  required>
                                            <option value="">-- Pilih Barang --</option>
                                            @foreach ($barang as $brg)
                                                <option value="{{ $brg->id }}">
                                                    {{ $brg->kode_barang.' - '.$brg->nama_barang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="qty" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty">
                                        @if ($errors->has('qty'))
                                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="harga_satuan" class="col-md-4 col-form-label text-md-end text-start">Harga Satuan</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" name="harga_satuan">
                                        @if ($errors->has('harga_satuan'))
                                            <span class="text-danger">{{ $errors->first('harga_satuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="stok" class="col-md-4 col-form-label text-md-end text-start">Tanggal Jual</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="tanggal_jual" name="tanggal_jual">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="satuan" class="col-md-4 col-form-label text-md-end text-start">Submit By</label>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" id="satuan" name="satuan" value="{{ session()->get('fullname') }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Simpan">
                                    <a href="/sales" class="col-md-3 offset-md-0 ml-2 btn btn-warning">Cancel</a>
                                </div>
                              
                            </form>
                      </div>
                  </div>
              </div>    
          </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection