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
                            <form action="{{ route('barang_add_proses') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-md-4 col-form-label text-md-end text-start">Nomor Penjualan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                                        @if ($errors->has('nama_barang'))
                                            <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_barang" class="col-md-4 col-form-label text-md-end text-start">Nama Customer</label>
                                    <div class="col-md-6">
                                        <input type="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" value="{{ old('kode_barang') }}">
                                        @if ($errors->has('kode_barang'))
                                            <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="barang" class="col-md-4 col-form-label text-md-end text-start">Items Barang</label>
                                    <div class="col-md-6">
                                        <select name="barang_id" class="form-control"  required>
                                            <option value="">-- Pilih Barang --</option>
                                            @foreach ($barang as $brg)
                                                <option value="{{ $brg->id }}">
                                                    {{ $brg->nama_barang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="qty" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty">
                                        @if ($errors->has('qty'))
                                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="harga_satuan" class="col-md-4 col-form-label text-md-end text-start">Harga Satuan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" name="harga_satuan">
                                        @if ($errors->has('harga_satuan'))
                                            <span class="text-danger">{{ $errors->first('harga_satuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="stok" class="col-md-4 col-form-label text-md-end text-start">Tanggal Jual</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="stok" name="stok">
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
                                    <a href="/barang" class="col-md-3 offset-md-0 ml-2 btn btn-warning">Cancel</a>
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