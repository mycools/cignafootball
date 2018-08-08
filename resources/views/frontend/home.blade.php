@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrappage-page bg_home non-fullpage home-page">

	<div class="home-slider">
		<div class="item slider-video">
			<a href="{{ url('/') }}">
  				<img class="d-none d-sm-block" src="{{ url('images/home/banner.jpg') }}" />
  				<img class="d-block d-sm-none" src="{{ url('images/home/banner_mobile.jpg') }}" />
	  		</a>
		</div>
	</div>

	<div class="section fp-auto-height active">
		<div class="container">

			<div class="row justify-content-center mb-30 mb-sm-15">
				<div class="col-12">
					<a class="btn-img" href="#">
						<img class="d-none d-sm-block w-100" src="{{ url('images/home/predict_banner_desktop.jpg') }}" />
						<img class="d-block d-sm-none w-100" src="{{ url('images/home/predict_banner_mobile.jpg') }}" />
					</a>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-12 col-sm-6 mb-30 mb-sm-15">
					<a class="btn-img" href="#">
						<img class="w-100" src="{{ url('images/home/user_ranking.jpg') }}" />
					</a>
				</div>
				<div class="col-12 col-sm-6 mb-30 mb-sm-15">
					<a class="btn-img" href="#">
						<img class="w-100" src="{{ url('images/home/rules_fun.jpg') }}" />
					</a>
				</div>
			</div>

			@include('frontend.components.home-share')

		</div>
	</div>

	<div class="home-ranking">
		<div class="btn btn-blue open-list">
			<img src="{{ url('images/icon/icon_trophy.png') }}" />
		</div>
		<div class="ranking-head">
			USER TOP 10 RANKING
		</div>
		<div class="ranking-list">
			@for ($i = 1; $i < 11; $i++)
			<div class="row-item">
				<div class="number">{{ $i }}</div>
				Helter Bbbbbbb
			</div>
			@endfor
		</div>
	</div>
</div>
@endsection
