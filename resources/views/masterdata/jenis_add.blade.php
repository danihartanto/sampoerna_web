@extends('./template.layouts')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Master Data Kategori</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Master Data</li>
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
                      <div class="card-header">Tambah Data Kategori</div>
                      <div class="card-body">
                            <form action="{{ route('jenis_add_proses') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nama_jenis" class="col-md-4 col-form-label text-md-end text-start">Nama Kategori</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('nama_jenis') is-invalid @enderror" id="nama_jenis" name="nama_jenis" value="{{ old('nama_jenis') }}">
                                        @if ($errors->has('nama_jenis'))
                                            <span class="text-danger">{{ $errors->first('nama_jenis') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_jenis" class="col-md-4 col-form-label text-md-end text-start">Kode</label>
                                    <div class="col-md-6">
                                        <input type="kode_jenis" class="form-control @error('kode_jenis') is-invalid @enderror" id="kode_jenis" name="kode_jenis" value="{{ old('kode_jenis') }}">
                                        @if ($errors->has('kode_jenis'))
                                            <span class="text-danger">{{ $errors->first('kode_jenis') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Simpan">
                                    <a href="/master/jenis" class="col-md-3 offset-md-0 ml-2 btn btn-warning">Cancel</a>
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