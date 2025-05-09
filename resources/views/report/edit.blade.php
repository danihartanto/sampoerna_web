@extends('./template.layouts')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="">
                <div class="row justify-content-center mt-2">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header">Update Data Penjualan No: <u><b>{{ $post->nomor_fak }}</b></u></div>
                            <div class="card-body">
                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form action="{{ route('sales_update_proses', $post->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label for="warehouse" class="col-md-4 col-form-label text-md-end text-start">ID Customer</label>
                                    <div class="col-md-6">
                                        <select name="sales_id" class="form-control"  required>
                                            {{-- <option value="">-- Pilih Satuan --</option> --}}
                                            @foreach ($sales as $items)
                                                <option value="{{ $items->id }}" {{ $post->sales_id == $items->id ? 'selected' : '' }}>
                                                    {{ $items->customer }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="warehouse" class="col-md-4 col-form-label text-md-end text-start">ID Barang</label>
                                    <div class="col-md-6">
                                        <select name="barang_id" class="form-control"  required>
                                            {{-- <option value="">-- Pilih Satuan --</option> --}}
                                            @foreach ($barangs as $items)
                                                <option value="{{ $items->id }}" {{ $post->barang_id == $items->id ? 'selected' : '' }}>
                                                    {{ $items->nama_barang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="qty" class="col-md-4 col-form-label text-md-end text-start">Quantity</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty', $post->qty) }}">
                                        @if ($errors->has('qty'))
                                            <span class="text-danger">{{ $errors->first('qty') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="harga_satuan" class="col-md-4 col-form-label text-md-end text-start">Harga Satuan</label>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan', $post->harga_satuan) }}">
                                        @if ($errors->has('harga_satuan'))
                                            <span class="text-danger">{{ $errors->first('harga_satuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="tanggal_jual" class="col-md-4 col-form-label text-md-end text-start">Tanggal Jual</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control @error('tanggal_jual') is-invalid @enderror" id="tanggal_jual" name="tanggal_jual" value="{{ old('tanggal_jual', $post->tanggal_jual) }}">
                                        @if ($errors->has('tanggal_jual'))
                                            <span class="text-danger">{{ $errors->first('tanggal_jual') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
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