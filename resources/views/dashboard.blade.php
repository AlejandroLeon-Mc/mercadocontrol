<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MERCADO CONTROL</title>    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> 
  </head>
  <body>    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">MERCADO CONTROL</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </header>
  <div class="container-fluid">
    <div class="row">
      @include('partes.nav')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Inicio</h1>        
          </div>
          <div class="px-md-4 pt-3">
            <h2>@yield('title',' ')</h2>
          </div>      
          <div class="" id="principal">
            <div class="container pt-4">
              <div class="row">
                @yield('body')
              </div>          
            </div>
            @yield('modals')        
          </div>
        </main>
    </div>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>      
    @yield('script') 
  </body>
</html>

