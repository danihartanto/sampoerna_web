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
                      <div class="card-header">Tambah Data Warehouse</div>
                      <div class="card-body">
                          <form action="{{ route('warehouse_update_proses', $post->id) }}" method="post">
                              @csrf
                              @method('PUT')
                              <div class="mb-3 row">
                                <label for="kode" class="col-md-4 col-form-label text-md-end text-start">Kode Warehouse</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $post->nama) }}" placeholder="Masukkan Judul Post">
                                      @if ($errors->has('kode'))
                                          <span class="text-danger">{{ $errors->first('kode') }}</span>
                                      @endif
                                  </div>
                                
                              </div>
                              {{-- <div class="mb-3 row">
                                  <label for="kode" class="col-md-4 col-form-label text-md-end text-start">Kode Warehouse</label>
                                  <div class="col-md-6">
                                    <input type="kode" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $post->kode) }}">
                                      @if ($errors->has('kode'))
                                          <span class="text-danger">{{ $errors->first('kode') }}</span>
                                      @endif
                                  </div>
                              </div> --}}
                              <div class="mb-3 row">
                                  <label for="lokasi" class="col-md-4 col-form-label text-md-end text-start">Lokasi</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $post->lokasi) }}">
                                      @if ($errors->has('lokasi'))
                                          <span class="text-danger">{{ $errors->first('lokasi') }}</span>
                                      @endif
                                  </div>
                              </div>
                              <div class="mb-3 row">
                                  <label for="kapasitas" class="col-md-4 col-form-label text-md-end text-start">Kapasitas</label>
                                  <div class="col-md-6">
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $post->kapasitas) }}">
                                  </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="telepon" class="col-md-4 col-form-label text-md-end text-start">Telepon</label>
                                <div class="col-md-6">
                                  <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $post->telepon) }}">
                                </div>
                            </div>
                              <div class="mb-3 row">
                                  <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                                  <a href="/warehouse" class="col-md-3 offset-md-0 ml-2 btn btn-warning">Cancel</a>
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