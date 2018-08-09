@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page bg_prize non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-12 col-sm-10 col-md-8 col-lg-7 m-auto text-center pt-sm-30">

					<img class="d-none d-sm-inline-block w-100" src="{{ url('images/prize_tour_desktop.png') }}" />
					<img class="d-inline-block d-sm-none w-100" src="{{ url('images/home/prize_tour_mobile.png') }}" />

				</div>
			</div>

		</div>
	</div>

</div>
@endsection
