<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="@yield('meta')" />
        <meta name="author" content="" />
        <title>Emency - @yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <img src="{{ asset('storage/dark.svg') }}" href="{{ route('home') }}" class="mr-2" width="50" height="50" alt="Emency logo white">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarColor01">
              @if (Auth::user())
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">My KPI's
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('instagram.index') ? 'active' : '' }}" href="{{ route('instagram.index') }}">INSTAGRAM</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Route::is('ecommerce.index') ? 'active' : '' }}" href="{{ route('ecommerce.index') }}">Ecommerce</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Adds</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">ANALYTICS</a>
                  </li>
                </ul>
                <ul class="navbar-nav me-sm-2">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">C&Choux</a>
                    <div class="dropdown-menu">
                      @php($clients = App\Models\Clients::all())
                      @if(count($clients)> 0)
                        @foreach($clients as $client)
                        <a class="dropdown-item" href="#">{{ $client->name }}</a>
                        @endforeach
                      @endif
                    </div>
                  </li>
                  @if (Auth::user()->role == 'ADMIN')
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('admin.index') }}">ADMIN</a>
                    </li>
                  @endif
                  <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="btn nav-link">Déconnexion</button>
                    </form>
                  </li>
                </ul>
              @endif
            </div>
          </div>
        </nav>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="py-5 container">
            @yield('content')
        </div>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Emency {{ date('Y') }}</p></div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <script src="/js/app.js"></script>
        
        <!-- Charting library -->
        <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
        <!-- Chartisan -->
        <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

        @yield('insta-javascript')
        @yield('ecommerce-javascript')

        <script>
          
        $(function() {
           $('#datetimepicker').datepicker({
            format: 'dd/mm/yyyy'
           });
        });
        </script>
    </body>
</html>
