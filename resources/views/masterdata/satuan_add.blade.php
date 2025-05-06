@extends('./template.layouts')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Master Data Satuan</h1>
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
                      <div class="card-header">Tambah Data Satuan</div>
                      <div class="card-body">
                            <form action="{{ route('satuan_add_proses') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="nama_satuan" class="col-md-4 col-form-label text-md-end text-start">Nama Satuan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('nama_satuan') is-invalid @enderror" id="nama_satuan" name="nama_satuan" value="{{ old('nama_satuan') }}">
                                        @if ($errors->has('nama_satuan'))
                                            <span class="text-danger">{{ $errors->first('nama_satuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_satuan" class="col-md-4 col-form-label text-md-end text-start">Kode</label>
                                    <div class="col-md-6">
                                        <input type="kode_satuan" class="form-control @error('kode_satuan') is-invalid @enderror" id="kode_satuan" name="kode_satuan" value="{{ old('kode_satuan') }}">
                                        @if ($errors->has('kode_satuan'))
                                            <span class="text-danger">{{ $errors->first('kode_satuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Simpan">
                                    <a href="/master/satuan" class="col-md-3 offset-md-0 ml-2 btn btn-warning">Cancel</a>
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