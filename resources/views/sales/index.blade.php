@extends('./template.layouts')

@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Sales</h1>
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
                  <h3 class="card-title">Data penjualan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="/sales/add" class="btn btn-md btn-success mb-2">Tambah Data</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomer penjualan</th>
                            <th>Customer</th>
                            <th>Tgl Jual</th>
							<th>Created BY</th>
                            <th>Created At</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $id=1; ?> 
                            @forelse ($posts as $post)
								<tr>
										<td>{{ $id++}}</td>
										<td>{{ $post->sales_number}}</td>
										<td>{{ $post->customer}}</td>
										<td>{{ $post->tanggal_jual}}</td>
										{{-- <td>{{ $post->stok }} - {{ $post->satuan }}</td> --}}
										<td>{{ $post->user->full_name}}</td>
										<td>{{ $post->created_at}}</td>
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