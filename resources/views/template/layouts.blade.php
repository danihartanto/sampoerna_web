
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/') }}adminlte/dist/css/adminlte.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    {{-- ckeditor-4 --}}
    <link rel="stylesheet" href="{{ asset('/') }}ckeditor/ckeditor.js">
    <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/codemirror/theme/monokai.css">

      <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="bi bi-journal-text"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/dashboard" class="nav-link">Home</a>
            </li>
            
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-toggle="dropdown" aria-expanded="true">
                {{ session()->get('fullname') }}
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                
                <a class="dropdown-item" href="#" >
                    Profilku
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-0">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('/') }}image/logos.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">sampoerna</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-header">Database</li>
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>
                            <p>
                                Dashboard
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a href="/warehouse" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>
                            <p>
                                Warehouse
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/barang" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>
                            <p>
                                Inventory
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/sales" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>
                            
                            <p>
                                Sales
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/report" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>
                            
                            <p>
                                Reporting
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/order" class="nav-link">
                            <i class="nav-icon bi bi-table"></i>

                            <p>
                                Order
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Master Data</li>
                    <li class="nav-item">
                        <a href="/customer" class="nav-link">
                            <i class="nav-icon bi bi-bag-plus-fill"></i>
                            
                            <p>
                                Customer
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/master/jenis" class="nav-link">
                            <i class="nav-icon bi bi-bag-plus-fill"></i>
                            
                            <p>
                                Jenis Items
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/master/satuan" class="nav-link">
                            <i class="nav-icon bi bi-bag-plus-fill"></i>
                            
                            <p>
                                Satuan Items
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Accounts</li>
                    <li class="nav-item">
                        <a href="/user" class="nav-link">
                            <i class="nav-icon bi bi-people-fill"></i>
                            
                            <p>
                                User
                                <i class="bi bi-caret-right-fill right"></i>
                            </p>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Administrator</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Admin Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        
        <!-- Main content -->
        <section class="content">
            {{-- konten utama disini --}}
            @yield('content')
            
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2023-2024 <a href="/">footer</a>.</strong> All rights reserved.
    </footer>
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/') }}adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
{{-- <script src="{{ asset('/') }}adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<!-- AdminLTE App -->
<script src="{{ asset('/') }}adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('/') }}adminlte/dist/js/demo.js"></script> --}}

<!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="{{ asset('/') }}adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-12:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [
            'heading', '|', 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
        ]
    } )
    .then( /* ... */ )
    .catch( /* ... */ );
</script>
@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
