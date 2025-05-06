@extends('./template.layouts')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="">
                <div class="row justify-content-center mt-2">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">Update Data Satuan</div>
                        <div class="card-body">
                            <form action="{{ route('satuan_update_proses', $post->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label for="nama_satuan" class="col-md-4 col-form-label text-md-end text-start">Nama</label>
                                    <div class="col-md-6">
                                        <input type="nama_satuan" class="form-control @error('nama_satuan') is-invalid @enderror" id="nama_satuan" name="nama_satuan" value="{{ old('nama_satuan', $post->nama_satuan) }}">
                                        @if ($errors->has('nama_satuan'))
                                            <span class="text-danger">{{ $errors->first('nama_satuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_satuan" class="col-md-4 col-form-label text-md-end text-start">Kode</label>
                                    <div class="col-md-6">
                                        <input type="kode_satuan" class="form-control @error('kode_satuan') is-invalid @enderror" id="kode_satuan" name="kode_satuan" value="{{ old('kode_satuan', $post->kode_satuan) }}">
                                        @if ($errors->has('kode_satuan'))
                                            <span class="text-danger">{{ $errors->first('kode_satuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
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