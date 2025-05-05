@extends('./template.layouts')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Warehouse</h1>
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
                      <div class="card-header">Tambah Data Barang</div>
                      <div class="card-body">
                            <form action="{{ route('barang_add_proses') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-md-4 col-form-label text-md-end text-start">Nama Barang</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                                        @if ($errors->has('nama_barang'))
                                            <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode" class="col-md-4 col-form-label text-md-end text-start">Kode Barang</label>
                                    <div class="col-md-6">
                                        <input type="kode" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}">
                                        @if ($errors->has('kode'))
                                            <span class="text-danger">{{ $errors->first('kode') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jenis" class="col-md-4 col-form-label text-md-end text-start">jenis</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis">
                                        @if ($errors->has('jenis'))
                                            <span class="text-danger">{{ $errors->first('jenis') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah" class="col-md-4 col-form-label text-md-end text-start">jumlah</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="satuan" class="col-md-4 col-form-label text-md-end text-start">satuan</label>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" id="satuan" name="satuan">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="pic" class="col-md-4 col-form-label text-md-end text-start">pic barang</label>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" id="pic" name="pic">
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