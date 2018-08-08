@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')
<link rel="stylesheet" type="text/css" href="/css/match.css" />

<div class="match-page">
	<div class="container">
		<div class="card-match border mt-4 p-2 pb-4">
			<div class="row">
				<div class="col-12">
					<h3 class="match-page-title text-uppercase f-1 mb-4">match of the weeks<br><span class="f-5 text-white">23 Aug - 2 Sep</span></h3>
				</div>

				<div class="col-12 dispay-match mb-4">
					<div class="d-flex justify-content-center">
						<div class="align-self-start">
							<img id="home-kits" class="kits px-4" src="{{ url('images/kits/sh_manchester_united.png') }}" />
							<label class="home-kits-label f-1 float-left" for="home-kits">Manchester united</label>

						</div>

						<div class="align-self-center font-weight-bold f-1">
							-
						</div>
						<div class="align-self-start">
							<img id="away-kits" class="kits px-4" src="{{ url('images/kits/sh_tottenhem.png') }}" />
							<label class="f-1" for="away-kits">Tottemham Hotspur</label>
						</div>

					</div>

				</div>
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<span class="times-remaining mt-2 f-4">เหลือเวลาอีก</span>
						<div class="time-box rounded f-1 border">38:20:01</div>
					</div>
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-green py-3 mt-4 btn-predict f-3">ทายผล<br><span>(22,112)</span></button>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<h1 class="match-page-title-lastweek">MATCH <span>ของสัปดาห์ก่อน</span></h1>
			</div>
			<div class="col-12">
				<div class="card-match-lastweek border p-4 mb-4">
					<div class="row">
						<div class="col-12">
							<h3 class="mb-3">
								week 20 Aug - 26 Aug
							</h3>
						</div>


						<div class="col-5 col-md-4 col-sm-5 ">
							<div class="warper-team-kits">
								<img class="kits float-left mt-2" src="{{ url('images/kits/sh_Leicester_city.png') }}" />
								<label for="" class="float-right text-right f-6 lh-9 mt-4 name">Leicester City</label>
							</div>
						</div>
						<div class="col-2 col-sm-2 text-center score">
							3 - 2
						</div>
						<div class="col-5 col-md-4 col-sm-5">
							<div class="warper-team-kits">
								<label for="" class="float-left f-6 lh-9 mt-4 name">Wolverhampton Wanderers</label>
								<img class="kits float-right mt-2" src="{{ url('images/kits/sh_wolverhampton.png') }}" />
							</div>

						</div>

						<div class="col-md-2 col-sm-12 p-0 text-center">
							<div class="total-predict">
								<div class="bg-secondary">
									<h4 class="mb-0 pt-2 pb-2 lh-1">ทายผลทั้งหมด<br><span class="f-6">44,786</span></h4>
								</div>
								<div class="float-left bg-success w-50 py-2">
									ถูก 786
								</div>
								<div class="float-right bg-danger w-50 py-2">
									ผิด 40,000
								</div>
							</div>
						</div>


					</div>

				</div>


				<div class="card-match-lastweek border p-4 mb-4">
					<div class="row">
						<div class="col-12">
							<h3>
								week 13 Aug - 18 Aug
							</h3>
						</div>

						<div class="col-5 col-md-4 col-sm-5 ">
							<div class="warper-team-kits">
								<img class="kits float-left mt-2" src="{{ url('images/kits/sh_brighton.png') }}" />
								<label for="" class="float-right text-right f-6 lh-9 mt-4 name">Brighton And Hove Albion</label>
							</div>
						</div>
						<div class="col-2 col-sm-2 text-center score">
							3 - 2
						</div>
						<div class="col-5 col-md-4 col-sm-5">
							<div class="warper-team-kits">
								<label for="" class="float-left f-6 lh-9 mt-4 name">Newcastle United</label>
								<img class="kits float-right mt-2" src="{{ url('images/kits/sh_newcastle.png') }}" />
							</div>

						</div>

						<div class="col-md-2 col-sm-12 p-0 text-center">
							<div class="total-predict">
								<div class="bg-secondary">
									<h4 class="mb-0 pt-2 pb-2 lh-1">ทายผลทั้งหมด<br><span class="f-6">44,786</span></h4>
								</div>
								<div class="float-left bg-success w-50 py-2">
									ถูก 786
								</div>
								<div class="float-right bg-danger w-50 py-2">
									ผิด 40,000
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="card-match-lastweek border p-4 mb-4">
					<div class="row">
						<div class="col-12">
							<h3>
								week 6 Aug - 12 Aug
							</h3>
						</div>



						<div class="col-5 col-md-4 col-sm-5 ">
							<div class="warper-team-kits">
								<img class="kits float-left mt-2" src="{{ url('images/kits/sh_arsenal.png') }}" />
								<label for="" class="float-right f-6 lh-9 mt-4 name">Arsenal</label>
							</div>
						</div>
						<div class="col-2 col-sm-2 text-center score">
							3 - 2
						</div>
						<div class="col-5 col-md-4 col-sm-5">
							<div class="warper-team-kits">
								<label for="" class="float-left f-6 lh-9 mt-4 name">Manchester City</label>
								<img class="kits float-right mt-2" src="{{ url('images/kits/sh_manchester_city.png') }}" />
							</div>

						</div>

						<div class="col-md-2 col-sm-12 p-0 text-center">
							<div class="total-predict">
								<div class="bg-secondary">
									<h4 class="mb-0 pt-2 pb-2 lh-1">ทายผลทั้งหมด<br><span class="f-6">44,786</span></h4>
								</div>
								<div class="float-left bg-success w-50 py-2">
									ถูก 786
								</div>
								<div class="float-right bg-danger w-50 py-2">
									ผิด 40,000
								</div>
							</div>
						</div>





					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection
