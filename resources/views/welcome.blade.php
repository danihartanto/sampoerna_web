<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <!-- Bootstrap 5 via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>
<style>
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
          <a class="navbar-brand text-white" href="{{ URL('/') }}">Sampoerna Web</a>
          <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                @else    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                        </ul>
                    </li>
                @endguest
            </ul>
          </div>
        </div>
    </nav>    

    <div class="container">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
              <div class="col-lg-6 col-md-8 mx-auto">
                <div class="px-4 py-2 my-2 text-center">
                    <img src="{{ asset('/') }}image/logos.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
                    {{-- <img class="d-block mx-auto mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                    <h1 class="display-5 fw-bold">Selamat Datang</h1>
                </div>
                {{-- <h1 class="fw-light">Album example</h1> --}}
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                  <a href="#" class="btn btn-primary my-2">Main call to action</a>
                  <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
              </div>
            </div>
        </section>
        @yield('content')
        <div class="row justify-content-center text-center mt-5 align-bottom">
            <div class="col-md-12">
                <p>Footer Page</p>
            </div>
        </div>
    </div>
       
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>