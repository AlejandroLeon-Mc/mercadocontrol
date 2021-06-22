<!DOCTYPE html>
<html lang="es">
<head>
    <title>MercadoControl</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content=""/>
    <meta name="author" content=""/>
	<link rel="stylesheet" href="{{ asset('marketplaces/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('marketplaces/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('marketplaces/fonts/material.css') }}">
    <link rel="stylesheet" href="{{ asset('marketplaces/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('marketplaces/css/customizer.css') }}">    
     <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
</head>
<body class="">
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>				
			</a>
			<a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a>
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="" class="" style="color: white;">
					MercadoControl					
				</a>
			</div>
			<div class="navbar-content">
				@if (auth()->check())@include('partes.nav')@endif
			</div>
		</div>
	</nav>
	
	<header class="pc-header ">
		<div class="header-wrapper">
			@if (auth()->check())
			<div class="ms-auto">
				<ul class="list-unstyled">
					
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="fa fa-search"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-end pc-h-dropdown drp-search">
							@yield('search')
						</div>
					</li>
					<li class="pc-h-item">
						<a class="pc-head-link me-0" href="#" id="target-mod" data-bs-toggle="modal" data-bs-target="#modalMC">
							<i class="fa fa-plus"></i>							
						</a>
					</li>													
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="{{asset('marketplaces/images/user/avatar-2.jpg')}}" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name">{{Auth::user()->name}}</span>
								<span class="user-desc">{{Auth::user()->email}}</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
							<div class=" dropdown-header">
								<h5 class="text-overflow m-0"><span class="badge bg-light-success">Pro</span></h5>
							</div>
							<a href="" class="dropdown-item">
								<i class="fa fa-user-circle"></i>
								<span>Profile</span>
							</a>
							<form action="{{ route('logout') }}" method="POST">
								@csrf				
										<button type="submit" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-lock"></i>Cerrar sesión</button>
								</form>
						</div>
					</li>					
				</ul>
			</div>
			@endif
		</div>
	</header>
	
	@yield('modal')
	
	<div class="pc-container">		
	    <div class="pcoded-content">
	    	@if (auth()->check())
	        <div class="row">
	            <div class="col-xl-12 col-md-12">
	                <div class="card feed-card">	                   
	                    <div class="feed-scroll" style="">
	                        <div class="card-body">
	                            <div class="row m-b-25 align-items-center">
	                                <div class="col">	                                    
										@yield('content')	                                        
	                                </div>
	                            </div>                                                       
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        @else
	        MERCADO CONTROL, BIENVENIDOS AQUI DEBE IR EL LANDING PAGE O PARA IR AL <a href="{{ route('login') }}">LOGIN</a>

	    	@endif	    	
	    </div>
	</div>	

    <script src="{{asset('marketplaces/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('marketplaces/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('marketplaces/js/plugins/feather.min.js')}}"></script> 
    <script src="{{asset('marketplaces/js/pcoded.min.js')}}"></script>    	   	
	@yield('scripts')
</body>
</html>