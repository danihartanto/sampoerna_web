@extends('./template.layouts')

@section('content')
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
<head>
	<title>Reports | Dashboard</title>
</head>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Laporan Data Perusahaan Tahun {{ now()->year}}</h1>
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
                  	<h3 class="card-title">Data Penjualan</h3>
				  	<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
						</button>
					</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- <a href="/sales/add" class="btn btn-md btn-success mb-2">Tambah Data</a> --}}
					@if(session('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomer penjualan</th>
                            <th>Customer</th>
							<th>Barang</th>
							<th>Qty</th>
							<th>Harga Per Items</th>
							<th>Total</th>
                            <th>Tgl Jual</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $id=1; ?> 
                            @forelse ($posts as $post)
								<tr>
										<td>{{ $id++}}</td>
										<td>{{ $post->nomor_fak}}</td>
										<td>{{ $post->sales->customer}}</td>
										<td>{{ $post->barangs->nama_barang}}</td>
										<td>{{ $post->qty }} {{ $post->barangs->satuan }}</td>
										<td>{{ "Rp " . number_format($post->harga_satuan, 0, ",", ".");}}</td>
										<td>{{ "Rp " . number_format($post->qty * $post->harga_satuan, 0, ",", ".");}}</td>
										<td>{{ $post->tanggal_jual }}</td>
										
								</tr>
								@empty
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Sorry!</strong> Data belum tersedia.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endforelse
                          </tbody>
                    </table>
					
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

			<div class="col-md-12">
              <div class="card">
				
                <div class="card-header">
                  	<h3 class="card-title">Data Pendapatan Barang</h3>
				  	<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
						</button>
					</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- <a href="/sales/add" class="btn btn-md btn-success mb-2">Tambah Data</a> --}}
					@if(session('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
							<th>Qty Terjual</th>
							<th>Total Pendapatan (rupiah)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $id=1; ?> 
                            @forelse ($salesdata as $values)
								<tr>
										<td>{{ $id++}}</td>
										<td>{{ $values['nama_barang']}}</td>
										<td>{{ $values['qty']}}</td>
										<td>{{ "Rp " . number_format($values['total'], 0, ",", ".");}}</td>
										
								</tr>
								@empty
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Sorry!</strong> Data belum tersedia.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endforelse
                          </tbody>
                    </table>
					
                </div>
                <!-- /.card-body -->
                
              </div>
              <!-- /.card -->
            </div>

			<div class="col-md-12">
              <div class="card">
				
                <div class="card-header">
                  	<h3 class="card-title">Data Pendapatan Barang</h3>
				  	<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
						</button>
					</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- <a href="/sales/add" class="btn btn-md btn-success mb-2">Tambah Data</a> --}}
					@if(session('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
                    <table id="example3" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
							<th>Stok Tersedia</th>
							<th>Qty Terjual</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $id=1; ?> 
                            @forelse ($salesdata3 as $values)
								<tr>
										<td>{{ $id++}}</td>
										<td>{{ $values['nama_barang']}}</td>
										<td>{{ $values['stok']}}</td>
										<td>{{ $values['qty']}}</td>
										
								</tr>
								@empty
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Sorry!</strong> Data belum tersedia.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endforelse
                          </tbody>
                    </table>
					
                </div>
                <!-- /.card-body -->
                
              </div>
              <!-- /.card -->
            </div>

			<div class="col-md-12">
              <div class="card">
				
                <div class="card-header">
                  	<h3 class="card-title">Data Customer Terbaik</h3>
				  	<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
						</button>
					</div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {{-- <a href="/sales/add" class="btn btn-md btn-success mb-2">Tambah Data</a> --}}
					@if(session('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
                    <table id="example4" class="table table-bordered table-hover display">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Customer</th>
							<th>Qty Terjual</th>
							<th>Total Pendapatan (rupiah)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $id=1; ?> 
                            @forelse ($salesdata2 as $values)
								<tr>
										<td>{{ $id++}}</td>
										<td>{{ $values['customer']}}</td>
										<td>{{ $values['qty']}}</td>
										<td>{{ "Rp " . number_format($values['total'], 0, ",", ".");}}</td>
										
								</tr>
								@empty
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Sorry!</strong> Data belum tersedia.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endforelse
                          </tbody>
                    </table>
					
                </div>
                <!-- /.card-body -->
                
              </div>
              <!-- /.card -->
            </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection