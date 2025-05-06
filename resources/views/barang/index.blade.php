@extends('./template.layouts')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Inventory</h1>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Bordered Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="/barang/add" class="btn btn-md btn-success mb-2">Tambah Data</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                          {{-- <th></th> --}}
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Kode</th>
                            {{-- <th>Jenis</th> --}}
                            {{-- <th>Telepon</th> --}}
                            <th>Jumlah</th>
							<th>Gudang</th>
                            <th>Lokasi Gudang</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $id=1; ?> 
                            @forelse ($posts as $post)
								<tr>
										<td>{{ $id++}}</td>
										<td>{{ $post->nama_barang}}</td>
										<td>{{ $post->kode_barang}}</td>
										{{-- <td>{{ $post->jenis}}</td> --}}
										<td>{{ $post->stok }} - {{ $post->satuan }}</td>
										<td>{{ $post->warehouse->nama}}</td>
										<td>{{ $post->warehouse->lokasi}}</td>
										<td class="text-center">
										<form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy', $post->id) }}" method="POST">
											{{-- <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">SHOW</a> --}}
											<a href="{{ route('barang_edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
										</form>
									</td>
								</tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Post belum Tersedia.
                                </div>
                            @endforelse
                          </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card -->
            </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection