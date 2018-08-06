@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "")
@section('og_image', "/images/share/share.jpg")

@section('content')

<!-- @include('frontend.components.home-slide') -->

<div class="home-feature">
	<div class="container">

		@php

		$spec = [
					1 => "features-more",
					2 => "features-more",
					3 => "Dig!C-8",
					4 => "auto-transfering",
					5 => "4K-video",
					6 => "Vari-angle-LCD",
					7 => "Dual-Pixel",
					8 => "features-detail"
				];

		@endphp

		<!-- Display only desktop -->
		<div class="d-none d-md-block">
			<div class="row">
				<div class="col-8 p-0">
					@for ($i = 1; $i < 9; $i++)
					<div class="item-feature sr-up">
						<a href="{{ url('features#'.@$spec[$i]) }}">
							<img src="images/home-page/feature-{{ $i }}.png" />
						</a>
					</div>
					@endfor
				</div>
				<div class="col-4 pl-30 pl-md-15 pt-15 sr">
					<img src="images/home-page/Camera.png" />
				</div>
			</div>
		</div>

		<!-- Display only mobile -->
		<div class="d-block d-md-none">
			<div class="row justify-content-center">
				<div class="col-8">
					<div class="mobile-slider">
						@for ($i = 1; $i < 9; $i++)
						<div class="item-feature">
							<a href="{{ url('features/#'.@$spec[$i]) }}">
								<img src="images/home-page/feature-{{ $i }}.png" />
							</a>
						</div>
						@endfor
					</div>
					<div class="mt-45">
						<img src="images/home-page/Camera.png" />
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


<div class="home-focuson">
	<div class="container">

		<div class="row justify-content-between align-items-center mb-60 mb-sm-45 mb-xs-30">
			<div class="col-auto">
				<h1 class="h-title text-white">FOCUS ON</h1>
			</div>
			<div class="col-auto text-right">
				<a class="btn btn-border-white" href="{{ url('focuson') }}">VIEW ALL</a>
			</div>
		</div>

	</div>
</div>

@endsection
