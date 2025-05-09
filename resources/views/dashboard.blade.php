@extends('template.layouts')

@section('content')
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $warehouse_count }}</h3>

              <p>Warehouse</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/warehouse" class="small-box-footer">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $penjualan_count }}<sup style="font-size: 20px"></sup></h3>

              <p>Penjualan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $customer_count }}</h3>

              <p>Customer</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $totalQty }}</h3>

              <p>Barang Terjual</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="bi bi-arrow-right-circle-fill"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Perbandingan Penjualan per Barang (Bar Chart)</h3>
							<div class="card-tools">
							  <button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							  </button>
							  <button type="button" class="btn btn-tool" data-card-widget="remove">
								<i class="fas fa-times"></i>
							  </button>
							</div>
						</div>
						<div class="card-body">
							<canvas id="stackedBarChart" height="120"></canvas>
							
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Stok Terjual per Barang</h3>
						</div>
						<div class="card-body">
							<canvas id="BarChart" height="100"></canvas>
							{{-- <canvas id="salesBarChart" height="100"></canvas> --}}
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Grafik Penjualan Harian (Line Chart)</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
								  <i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
								  <i class="fas fa-times"></i>
								</button>
							  </div>
						</div>
						<div class="card-body">
							<canvas id="salesLineChart" height="100"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Grafik Penjualan Barang (Pie Chart)</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
								  <i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
								  <i class="fas fa-times"></i>
								</button>
							  </div>
						</div>
						<div class="card-body">
							<canvas id="salesPieChart" height="100"></canvas>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	function getRandomColor(length) {
		const letters = '0123456789ABCDEF';
		let color = '#';
		for (let i = 0; i < length; i++) {
			color += letters[Math.floor(Math.random() * 10)];
		}
		return color;
	}

	let chartInstance;
    function fetchChartData() {
        fetch('/api/chart-data/stackedbar')
            .then(res => res.json())
            .then(data => {
                const ctx = document.getElementById('stackedBarChart').getContext('2d');

                const chartData = {
                    labels: data.labels,
                    datasets: [
						{
							label: 'Stok Tersedia',
							data: data.stok,
							backgroundColor: ['rgba(100, 255, 100, 0.4)'],
							// backgroundColor: ['#28a745'],
							borderRadius: 5,
							stack: 'total'
						},
						{
							label: 'Qty Terjual',
							data: data.terjual,
							backgroundColor: ['rgba(255, 100, 100, 0.4)'],
							// backgroundColor: ['#dc3545'],
							borderRadius: 5,
							stack: 'total'
						}
					]
                };

                const options = {
                    responsive: true,
                    scales: {
                        x: { 
							stacked: true,
							ticks: {
								maxRotation: 90,
                        		minRotation: 30,
							} 
						},
                        y: { stacked: true, beginAtZero: true }
                    },
                    plugins: {
                        legend: { position: 'top' },
                        title: {
                            display: true,
                            text: 'Stok vs Terjual (Update Tiap 10 Detik)'
                        }
                    }
                };

                if (chartInstance) {
                    chartInstance.data = chartData;
                    chartInstance.update();
                } else {
                    chartInstance = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: options
                    });
                }
            });
    }
    // Initial load
    fetchChartData();
    // Refresh every 10 seconds
    setInterval(fetchChartData, 10000);


	// bar chart
	let barChartInstance;
    function fetchBarChartData() {
        fetch('/api/chart-data/barchart')
            .then(res => res.json())
            .then(data => {
                const ctx = document.getElementById('BarChart').getContext('2d');
				console.log(data.values.length);

                const chartData = {
                    labels: data.labels,
                    // labels: {!! json_encode($labels) !!},
					datasets: [{
						label: 'Total Penjualan',
						data: data.values,
						backgroundColor: Array.from({ length: 6 }, () => getRandomColor(6)),
						borderWidth: 1
					}]
                };

                const options = {
                    responsive: true,
                    scales: {
                        x: { 
							stacked: true,
							ticks: {
								maxRotation: 90,
                        		minRotation: 30,
							} 
						},
                        y: { stacked: true, beginAtZero: true }
                    },
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Stok Terjual (Update Tiap 10 Detik)'
                        }
                    }
                };

                if (barChartInstance) {
                    barChartInstance.data = chartData;
                    barChartInstance.update();
                } else {
                    barChartInstance = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: options
                    });
                }
            });
    }
    // Initial load
    fetchBarChartData();
    // Refresh every 10 seconds
    setInterval(fetchBarChartData, 10000);



	// line chart
	let fetchLineChartInstance;
    function fetchLineChartData() {
        fetch('/api/chart-data/linechart')
            .then(res => res.json())
            .then(data => {
                const ctx = document.getElementById('salesLineChart').getContext('2d');

                const chartData = {
                    labels: data.labels,
                    // labels: {!! json_encode($labels) !!},
					// datasets: [{
					// 	label: 'Total Penjualan',
					// 	data: {!! json_encode($values) !!},
					// 	backgroundColor: [
					// 		'#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1',
					// 		'#20c997', '#fd7e14', '#17a2b8', '#e83e8c', '#6610f2',
					// 		'#ff6384', '#36a2eb', '#ff9f40', '#4bc0c0', '#9966ff'
					// 	],
					// 	borderWidth: 1
					// }]
					datasets: [{
						label: 'Total per Transaksi (Rp)',
						data: data.values, // Nilai total masing-masing
						borderColor: '#007bff',
						backgroundColor: 'rgba(0,123,255,0.2)',
						fill: true,
						tension: 0.3,
						pointRadius: 5,
						pointHoverRadius: 6
					}]
                };

                const options = {
					responsive: true,
					scales: {
						y: {
							beginAtZero: true,
							ticks: {
								callback: value => value.toLocaleString('id-ID') + ' qty'
							}
						},
						x: {
							ticks: {
								maxRotation: 90,
                        		minRotation: 30,
								autoSkip: true,
								maxTicksLimit: 25,
						
							}
						}
					},
                    plugins: {
						legend: { display: false },
						title: {
							display: true,
							text: 'Penjualan per Transaksi (Daily)'
						}
					}
                };

                if (fetchLineChartInstance) {
                    fetchLineChartInstance.data = chartData;
                    fetchLineChartInstance.update();
                } else {
                    fetchLineChartInstance = new Chart(ctx, {
                        type: 'line',
                        data: chartData,
                        options: options
                    });
                }
            });
    }
    // Initial load
    fetchLineChartData();
    // Refresh every 10 seconds
    setInterval(fetchLineChartData, 10000);

	var ctx = document.getElementById('salesPieChart').getContext('2d');
    var salesPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                data: {!! json_encode($values) !!},
                backgroundColor: [
                    '#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1',
                    '#20c997', '#fd7e14', '#17a2b8', '#e83e8c', '#6610f2'
                ]
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom'
            },
            title: {
                display: true,
                text: 'Total Penjualan per Tanggal'
            }
        }
    });

	// const line = document.getElementById('salesLineChartx').getContext('2d');
    // new Chart(line, {
    //     type: 'line',
    //     data: {
    //         labels: {!! json_encode($line_labels) !!}, // Tanggal per transaksi
    //         datasets: [{
    //             label: 'Total per Transaksi (Rp)',
    //             data: {!! json_encode($line_values) !!}, // Nilai total masing-masing
    //             borderColor: '#007bff',
    //             backgroundColor: 'rgba(0,123,255,0.2)',
    //             fill: true,
    //             tension: 0.3,
    //             pointRadius: 4,
    //             pointHoverRadius: 6
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         scales: {
    //             y: {
    //                 beginAtZero: true,
    //                 ticks: {
    //                     callback: value => 'Rp ' + value.toLocaleString('id-ID')
    //                 }
    //             },
    //             x: {
    //                 ticks: {
    //                     autoSkip: true,
    //                     maxTicksLimit: 15
    //                 }
    //             }
    //         },
    //         plugins: {
    //             legend: { position: 'top' },
    //             title: {
    //                 display: true,
    //                 text: 'Penjualan per Transaksi (Harian per Tanggal)'
    //             }
    //         }
    //     }
    // });
</script>

@endsection