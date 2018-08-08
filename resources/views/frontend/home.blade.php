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

			<div class="row justify-content-center mt-45 mt-sm-30 pb-45 pb-sm-15">
				<div class="col-12 mb-30 mb-sm-15 p-sm-0 d-none d-sm-block">
					<div class="box-bg-img">
						<div class="content color-white">
							แชร์กิจกรรม <span class="text-large">Match Of The Weeks</span><br />
							ทายผลฟุตบอลอังกฤษ <span class="color-yellow font-italic">ลุ้นรับรางวัลมูลค่า 30 ล้านบาท</span>
							<div class="row mt-15">
								<div class="col-8 col-sm-6 col-md-4 m-auto">
									<a class="btn btn-white color-blue w-100 pt-10 pb-10"><i class="fa fa-share-alt mgr-5"></i> คลิกแชร์กิจกรรม</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-8 col-sm-3 m-auto d-block d-sm-none">
					<a class="btn btn-blue color-white w-100 pt-10 pb-10"><i class="fa fa-share-alt mgr-5"></i> คลิกแชร์กิจกรรม</a>
				</div>
			</div>

		</div>
	</div>

</div>
@endsection
