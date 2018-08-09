@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')
<link rel="stylesheet" type="text/css" href="/css/match.css" />

<div class="match-page">
	<div class="container">
		@if ($matchInfo)
			<div class="card-match border mt-4 p-2 pb-4">
				<div class="row">
					<div class="col-12">
						<h3 class="match-page-title text-uppercase f-1 mb-4">match of the weeks<br><span class="f-5 text-white">{{ Carbon\Carbon::parse($matchInfo->match_start)->format('d-M') }} - {{ Carbon\Carbon::parse($matchInfo->match_end)->format('d-M') }}</span></h3>
					</div>

					<div class="col-12 dispay-match mb-4">
						<div class="d-flex justify-content-center">
							<div class="align-self-start">
								<img id="home-kits" class="kits px-4" src="url({{ $matchInfo->teamA->shirt_img_url }})" />
								<label class="home-kits-label f-1 float-left" for="home-kits">{{ $matchInfo->teamA->team_name }}</label>

							</div>

							<div class="align-self-center font-weight-bold f-1">
								-
							</div>
							<div class="align-self-start">
								<img id="away-kits" class="kits px-4" src="url({{ $matchInfo->teamB->shirt_img_url }})" />
								<label class="f-1" for="away-kits">{{ $matchInfo->teamB->team_name }}</label>
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
						<a href="{{ url('match/predict/'.$matchInfo->id ) }}" class="btn btn-green py-3 mt-4 btn-predict f-3">ทายผล<br><span>({{ $matchInfo->bet_total_count }})</span></a>
					</div>

				</div>
			</div>
		@endif

		<div class="row">
			<div class="col-12">
				<h1 class="match-page-title-lastweek">MATCH <span>ของสัปดาห์ก่อน</span></h1>
			</div>
			<div class="col-12">
				@foreach ($previousMatch as $match)
					<div class="card-match-lastweek border p-4 mb-4">
						<div class="row">
							<div class="col-12">
								<h3 class="mb-3">
									{{ Carbon\Carbon::parse($match->match_start)->format('d-M') }} - {{ Carbon\Carbon::parse($match->match_end)->format('d-M') }}
								</h3>
							</div>
							<div class="col-5 col-md-4 col-sm-5 c-5">
								<div class="warper-team-kits">
									<img class="kits float-left mt-2" src="url({{ $match->teamA->shirt_img_url }})" />
									<label for="" class="float-right text-right f-6 lh-9 mt-4 name">{{ $match->teamA->team_name }}</label>
								</div>
							</div>
							<div class="col-2 col-sm-2 text-center score">
								{{$match->score_a}} - {{$match->score_b}}
							</div>
							<div class="col-5 col-md-4 col-sm-5 c-5">
								<div class="warper-team-kits">
									<label for="" class="float-left f-6 lh-9 mt-4 name">{{ $match->teamB->team_name }}</label>
									<img class="kits float-right mt-2" src="url({{ $match->teamB->shirt_img_url }})" />
								</div>

							</div>

							<div class="col-md-2 col-sm-12 p-0 text-center c-12">
								<div class="total-predict">
									<div class="bg-secondary">
										<h4 class="mb-0 pt-2 pb-2 lh-1">ทายผลทั้งหมด<br><span class="f-6">{{ $match->bet_total_count }}</span></h4>
									</div>
									<div class="float-left bg-success w-50 py-2">
										ถูก {{ $match->win_total_count }}
									</div>
									<div class="float-right bg-danger w-50 py-2">
										ผิด {{ $match->lose_total_count }}
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>

	</div>
</div>

@endsection
