@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')
<link rel="stylesheet" type="text/css" href="/css/match.css" />
@php
$now = Carbon\Carbon::now();
$now = $now->toDateTimeString();

if ($matchInfo != []) {

	if(strtotime($matchInfo['match_start']) <= strtotime($now) && strtotime($matchInfo['bet_end']) >= strtotime($now)) {

		$time = $matchInfo['bet_end'];
	} else {

		$time = "";
	}
} else {
	$time = "";
}


@endphp
<div class="wrapper-page bg_match non-fullpage">
<div class="bg_wrapper bg_match"></div>
<div class="match-page">
	<div class="container">

		@if(Session::has('flash_messages'))
			@php
				$flash_messages = Session::get('flash_messages');
				echo "<body onload=\"window.alert('ระบบได้บันทึกข้อมูลการทายผลเรียบร้อยแล้วค่ะ');\">";
			@endphp

		@endif

		@if ($matchInfo)
			<div class="card-match border mt-md-4 p-2 pb-4 mt-xs-0">
				<div class="row">
					<div class="col-12">
						<h1 class="text-extra-large font-bold color-yellow text-uppercase mb-0 mt-15" style="line-height: 0.85">matchweek {{ $matchInfo->id }}</h1>
						<div class="p text-large font-bold text-white mb-10 text-uppercase">{{ Carbon\Carbon::parse($matchInfo->match_end)->format('d M Y') }}</div>
					</div>

					<div class="col-12 dispay-match mb-4">
						<div class="d-flex justify-content-center">
							<div class="align-self-start d-none d-md-block">
								<img id="home-kits" class="kits px-4" src="{{ \Storage::url($matchInfo->teamA->shirt_img_url) }}" />
								<label class="home-kits-label f-1 float-left" for="home-kits">{{ $matchInfo->teamA->team_name }}</label>

							</div>
							<div class="align-self-start d-block d-md-none col-6 p-0">
								<img id="home-kits" class="kits px-4" src="{{ \Storage::url($matchInfo->teamA->shirt_img_url) }}" />
								<label class="home-kits-label f-1 float-left" for="home-kits">{{ $matchInfo->teamA->team_name }}</label>

							</div>

							<div class="align-self-center font-weight-bold f-1">
								-
							</div>
							<div class="align-self-start d-none d-md-block">
								<img id="away-kits" class="kits px-4" src="{{ \Storage::url($matchInfo->teamB->shirt_img_url) }}" />
								<label class="f-1" for="away-kits">{{ $matchInfo->teamB->team_name }}</label>
							</div>
							<div class="align-self-start d-block d-md-none col-6 p-0">
								<img id="away-kits" class="kits px-4" src="{{ \Storage::url($matchInfo->teamB->shirt_img_url) }}" />
								<label class="f-1" for="away-kits">{{ $matchInfo->teamB->team_name }}</label>
							</div>

						</div>

					</div>
					<div class="col-12">
						<div class="d-flex justify-content-center align-items-center">
							@if($time)
								<span class="times-remaining f-4">เหลือเวลาอีก</span>
								<div class="time-box rounded f-3 border pl-25 pr-25 pl-xs-10 pr-xs-10" id="getting-started" data-time="{{ $time }}"></div>
							@else
								<div class="time-box rounded f-1 border" id="getting-started">ยังไม่เริ่มกิจกรรม</div>
							@endif
							{{-- <div></div> --}}
						</div>
					</div>
					<div class="col-12 mb-10">
						<a href="{{ 'match/predict/'.$matchInfo->id }}" class="btn btn-green py-3 mt-4 btn-predict f-3">ทายผล<!-- <br><span>({{ $total_count }})</span> --></a>
					</div>

				</div>
			</div>
		@endif

		<div class="row pb-5 pb-md-0">

			@foreach ($previousMatch as $match)
				<div class="col-12">
					<h1 class="match-page-title-lastweek font-bold">MATCH {{$match->id}}</h1>
				</div>
				<div class="col-12">
					<div class="card-match-lastweek border p-4 mb-4">
						<div class="row">
							<div class="col-12">
								<h3 class="mb-3">
									{{ Carbon\Carbon::parse($match->match_end)->format('d M Y') }}
								</h3>
							</div>
							<div class="col-5 col-md-4 col-sm-5 c-5">
								<div class="warper-team-kits">
									<img class="kits float-left mt-2" src="{{ \Storage::url($match->teamA->shirt_img_url) }}" />
									<label for="" class="float-right text-right f-6 lh-9 mt-4 name">{{ $match->teamA->team_name }}</label>
								</div>
							</div>
							<div class="col-2 col-sm-2 text-center score">
								{{$match->score_a}} - {{$match->score_b}}
							</div>
							<div class="col-5 col-md-4 col-sm-5 c-5">
								<div class="warper-team-kits">
									<label for="" class="float-left f-6 lh-9 mt-4 name">{{ $match->teamB->team_name }}</label>
									<img class="kits float-right mt-2" src="{{ \Storage::url($match->teamB->shirt_img_url) }}" />
								</div>

							</div>

							<div class="col-md-2 col-sm-12 p-0 text-center c-12">
								<div class="total-predict">
									<div class="bg-secondary">
										<h4 class="mb-0 pt-2 pb-2 lh-1">ทายผลทั้งหมด<!-- <br><span class="f-6">{{ $match->bet_total_count }}</span> --></h4>
									</div>
									<div class="float-left bg-success w-50 py-2">
                                    @if($match->bet_total_count > 0)
										ถูก <br />{{ number_format(($match->win_total_count * 100) / $match->bet_total_count ,2) }} %
                                    @else
                                    ถูก <br />0 %
                                    @endif
									</div>
									<div class="float-right bg-danger w-50 py-2">
                                    @if($match->bet_total_count > 0)
										ผิด <br />{{ number_format(($match->lose_total_count * 100) / $match->bet_total_count ,2) }} %
                                    @else
                                        ผิด <br />0 %
                                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach

			<div class="col-12 mt-3 mb-3 text-center">
				<a href="https://www.premierleague.com/tables" target="_blank" class="btn btn-green pl-4 pr-4 pt-3 pb-3 txt-large btn-predict ">ตารางคะแนน</a>
			</div>
		</div>

	</div>
</div>
</div>

@endsection

@section('scripts')

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js"></script>
<script src="//cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>

<script type="text/javascript">
	@if($time)
		$(function() {
		  $("#getting-started").countdown($("#getting-started").data('time'), function(event) {
		    $(this).text(
		      event.strftime('%D วัน %H:%M:%S')
		    );
		  });
		});
	@endif
</script>

@stop
