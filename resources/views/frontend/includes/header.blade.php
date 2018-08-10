<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
	<head>
		@include('frontend.includes.meta')

		<title>Cigna : Match of The Weeks</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="icon" type="image/png" href="{{ url('/images/icon/icon.ico') }}" sizes="32x32" />

		@include('frontend.includes.stylesheet')

		@include('frontend.includes.header_script')

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-KBKPVL2');</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBKPVL2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div id="app">

			<!-- Fixed navbar -->
	        <nav id="header" class="navbar sticky-top navbar-expand-md justify-content-center">
	            <div id="header-container" class="container navbar-container">
	                <div class="navbar-header d-flex w-25 mr-auto">
	                    <a id="brand" class="navbar-brand" href="{{ url('/') }}">
	                    	<img src="{{ url('images/logo/logo_match_of_the_week.png') }}" />
	                    </a>
	                </div>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    	<img class="close" src="{{ url('images/icon/close.png') }}" />
                    	<img class="open" src="{{ url('images/icon/open.png') }}" />
                    </button>
	                <div class="navbar-collapse collapse w-100" id="navbarNavDropdown">
    					<ul class="navbar-nav w-100 justify-content-center nav-pills nav-fill">
				            <li class="nav-item">
								<a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ Request::is('match') ? 'active' : '' }}" href="{{ url('match') }}">Match</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ Request::is('ranking') ? 'active' : '' }}" href="{{ url('ranking') }}">Ranking</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link {{ Request::is('healthtips') ? 'active' : '' }}" href="{{ url('healthtips') }}">Health Tips</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link {{ Request::is('prize') ? 'active' : '' }}" href="{{ url('prize') }}">Prize</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ Request::is('rules') ? 'active' : '' }}" href="{{ url('rules') }}">Rules</a>
							</li>
						</ul>
						<ul class="nav navbar-nav ml-auto w-25 justify-content-end">

							@if(!Auth::user())
							<li class="nav-item pdl-5">
								<a class="nav-link pr-0 special {{ Request::is('signin') ? 'active' : '' }}" href="{{ url('signin') }}"><img src="{{ url('images/icon/icon_invite_menu.png') }}" /> Sign in</a>
							</li>
							@endif

							@if(Auth::user())
							<li class="nav-item">
								<a class="nav-link special btn-copy {{ Request::is('invite') ? 'active' : '' }}" href="javascript:;" onclick="copyToCliboard()">
									<span class="d-flex d-md-none">Invite</span><img src="{{ url('images/icon/icon_invite_menu.png') }}" />
								</a>
							</li>
							<li class="nav-item dropdown d-none d-md-block">
								<a class="nav-link pr-0 special dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('images/icon/icon_profile_menu.png') }}" /></a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			                        <a class="dropdown-item {{ Request::is('profile') ? 'active' : '' }}" href="{{ url('profile') }}">Profile</a>
			                        <a class="dropdown-item last-child" href="{{ url('signout') }}">Sign Out</a>
			                    </div>
							</li>
							<li class="nav-item d-block d-md-none">
								<a class="nav-link special {{ Request::is('profile') ? 'active' : '' }}" href="{{ url('profile') }}"><span class="d-flex d-md-none">Profile</span><img src="{{ url('images/icon/icon_profile_menu.png') }}" /></a>
							</li>
							<li class="nav-item d-block d-md-none last-child">
								<a class="nav-link special color-blue" href="{{ url('signout') }}"><span class="d-flex d-md-none">Sign Out</span></a>
							</li>
							@endif

				          </ul>
	                </div>
	            </div>
	        </nav>
	        @if(Auth::user())
	        <div class="container text-right" style="height: 0;">
	        	<input id="myInputCopy" type="text" value="{{ url('register/'. Auth::user()->ref_code) }}" />
	        </div>
	        @endif
	        <!-- End Fixed navbar -->