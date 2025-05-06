@extends('./template.layouts')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
          <div class="">
            <div class="row justify-content-center mt-2">
              <div class="col-md-11">
                  <div class="card">
                      <div class="card-header">Update Data Barang</div>
                      <div class="card-body">
                          <form action="{{ route('barang_update_proses', $post->id) }}" method="post">
                              @csrf
                              @method('PUT')
                              <div class="mb-3 row">
                                <label for="kode" class="col-md-4 col-form-label text-md-end text-start">Nama Barang</label>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang', $post->nama_barang) }}" placeholder="Masukkan Judul Post">
                                      @if ($errors->has('nama_barang'))
                                          <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                                      @endif
                                  </div>
                                
                              </div>
                              {{-- <div class="mb-3 row">
                                  <label for="kode" class="col-md-4 col-form-label text-md-end text-start">Kode Barang</label>
                                  <div class="col-md-6">
                                    <input type="kode" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $post->kode) }}">
                                      @if ($errors->has('kode'))
                                          <span class="text-danger">{{ $errors->first('kode') }}</span>
                                      @endif
                                  </div>
                              </div> --}}
                              
                            <div class="mb-3 row">
                                <label for="stok" class="col-md-4 col-form-label text-md-end text-start">stok</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $post->stok) }}">
                                </div>
                            </div>
                            {{-- <div class="mb-3 row">
                                <label for="satuan" class="col-md-4 col-form-label text-md-end text-start">satuan</label>
                                <div class="col-md-6">
                                <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan', $post->satuan) }}">
                                </div>
                            </div> --}}
                            <div class="mb-3 row">
                                <label for="warehouse" class="col-md-4 col-form-label text-md-end text-start">Satuan</label>
                                <div class="col-md-6">
                                    <select name="satuan" class="form-control"  required>
                                        {{-- <option value="">-- Pilih Satuan --</option> --}}
                                        @foreach ($satuans as $satuan)
                                            <option value="{{ $satuan->kode_satuan }}" {{ $post->satuan == $satuan->kode_satuan ? 'selected' : '' }}>
                                                {{ $satuan->nama_satuan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="warehouse" class="col-md-4 col-form-label text-md-end text-start">Lokasi Warehouse</label>
                                <div class="col-md-6">
                                    <select name="warehouse_id" class="form-control"  required>
                                        <option value="">-- Pilih Gudang --</option>
                                        @foreach ($warehouses as $wh)
                                            <option value="{{ $wh->id }}" {{ $post->warehouse_id == $wh->id ? 'selected' : '' }}>
                                                {{ $wh->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                              <div class="mb-3 row">
                                  <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
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