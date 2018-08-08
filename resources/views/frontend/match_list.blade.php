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
					<h3 class="match-page-title text-uppercase f-1">match of the weeks</h3>
					<span class="f-4">23 Aug - 2 Sep</span>
				</div>

				<div class="col-12 dispay-match font-weight-bold mb-4">
					<div class="d-flex justify-content-center">
						<div class="align-self-start">
							<img id="home-kits" class="kits px-4" src="{{ url('images/kits/sh_manchester_united.png') }}" />
							<label class="home-kits-label float-left" for="home-kits">Manchester united</label>

						</div>

						<div class="align-self-center">
							-
						</div>
						<div class="align-self-start">
							<img id="away-kits" class="kits px-4" src="{{ url('images/kits/sh_tottenhem.png') }}" />
							<label for="away-kits float-right">Tottemham Hotspur</label>
						</div>

					</div>

				</div>
				<div class="col-12">
					<div class="d-flex justify-content-center">
						<span class="times-remaining">เหลือเวลาอีก</span>
						<div class="time-box rounded">33:20:01</div>
					</div>
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-green mt-4 btn-predict f-3">ทายผล<br><span>(22,112)</span></button>
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
							<h3>
								week 20 Aug - 26 Aug
							</h3>
						</div>
						<div class="d-flex justify-content-between m-auto">
							<div class="col-md-4 col-sm-4 text-center font-weight-bold mt-3">
								<img class="kits" src="{{ url('images/kits/sh_Leicester_city.png') }}" />
								<label for="" class="float-left w-100 away-team-home">Leicester City</label>
							</div>

							<div class="col-md-3 col-sm-2 text-center score font-weight-bold mt-3">
								3 - 2
							</div>

							<div class="col-md-4 col-sm-4 text-center font-weight-bold mt-3">
								<img class="kits" src="{{ url('images/kits/sh_wolverhampton.png') }}" />
								<label for="" class="float-left w-100 away-team-name">Wolverhampton Wanderers</label>
							</div>
						</div>

						<div class="col-md-3 col-sm-12  text-center">
							<div class="total-predict">
								<div class="bg-secondary">
									<h4 class="mb-0  pt-1">ทายผลทั้งหมด</h4>
									<h3 class="mb-0">77,126</h3>
								</div>
								<div class="float-left bg-success w-50">
									ถูก 73,126
								</div>
								<div class="float-right bg-danger  w-50">
									ผิด 4,000
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

						<div class="d-flex justify-content-between m-auto">
							<div class="col-md-4 col-sm-4 text-center font-weight-bold mt-3">
								<img class="kits" src="{{ url('images/kits/sh_brighton.png') }}" />
								<label for="" class="float-left w-100 away-team-home">Brighton And Hove Albion</label>
							</div>

							<div class="col-md-3 col-sm-2 text-center score font-weight-bold mt-3">
								3 - 2
							</div>

							<div class="col-md-4 col-sm-4 text-center font-weight-bold mt-3">
								<img class="kits" src="{{ url('images/kits/sh_newcastle.png') }}" />
								<label for="" class="float-left w-100 away-team-name">Newcastle United</label>
							</div>
						</div>

						<div class="col-md-3 col-sm-12  text-center">
							<div class="total-predict">
								<div class="bg-secondary">
									<h4 class="mb-0  pt-1">ทายผลทั้งหมด</h4>
									<h3 class="mb-0">44,786</h3>
								</div>
								<div class="float-left bg-success w-50">
									ถูก 786
								</div>

								<div class="float-right bg-danger  w-50">
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

						<div class="d-flex justify-content-between m-auto">
							<div class="col-md-4 col-sm-4 text-center font-weight-bold mt-3">
								<img class="kits" src="{{ url('images/kits/sh_arsenal.png') }}" />
								<label for="" class="float-left w-100 away-team-home">Arsenal</label>
							</div>

							<div class="col-md-3 col-sm-2 text-center score font-weight-bold mt-3">
								9 - 0
							</div>

							<div class="col-md-4 col-sm-4 text-center font-weight-bold mt-3">
								<img class="kits" src="{{ url('images/kits/sh_manchester_city.png') }}" />
								<label for="" class="float-left w-100 away-team-name">Manchester City</label>
							</div>
						</div>


						<div class="col-md-3 col-sm-12  text-center">
							<div class="total-predict rounded">
								<div class="bg-secondary">
									<h4 class="mb-0  pt-1">ทายผลทั้งหมด</h4>
									<h3 class="mb-0">34,786</h3>
								</div>
									<div class="float-left bg-success w-50">
										ถูก 786
									</div>
									<div class="float-right bg-danger  w-50">
										ผิด 30,000
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
