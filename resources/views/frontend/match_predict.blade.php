@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

@php
$now = Carbon\Carbon::now();
$now = $now->toDateTimeString();

if(strtotime($matchInfo['match_start']) <= strtotime($now) && strtotime($matchInfo['bet_end']) >= strtotime($now)) {

	$time = $matchInfo['bet_end'];
} else {

	$time = "";
}

@endphp

<link rel="stylesheet" type="text/css" href="/css/match.css" />

<div class="wrapper-page bg_match_predict non-fullpage">
<div class="bg_wrapper bg_match_predict"></div>
<form name="match_select" id="match_select" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="vote_team" id="vote_team">
	<div class="match-page match-predict-page" id="match-predict">
		<div class="container match-predict">
			<div class="card-match mt-md-4 p-2 pb-4 mt-xs-0">
				<div class="row">
					<div class="col-12">
						<h1 class="text-extra-large font-bold color-yellow text-uppercase mb-0" style="line-height: 0.85">matchweek {{ $matchInfo->id }}</h1>
						<div class="p text-large font-bold text-white text-uppercase">{{ Carbon\Carbon::parse($matchInfo->match_end)->format('d M Y') }}</div>
					</div>
					<div class="col-12">
						<div class="d-flex justify-content-around block-vote">
							<div class="home">
								<img class="kits" src="{{ \Storage::url($matchInfo->teamA->shirt_img_url) }}" />
								<h1 class="pb-4 pt-3">{{ $matchInfo->teamA->team_name }}</h1>
							</div>
							<div class="time mt-3 mb-auto pl-3 d-none d-md-flex">
			                @if($time)
			                  <h4 class="times-remaining mt-4 pr-10">เหลือเวลาอีก</h4>
			                  <div class="time-box rounded border">
			                    <span id="getting-started" data-time="{{ $time }}"></span>
			                  </div>
			                @endif
							</div>
							<div class="away">
								<img class="kits" src="{{ \Storage::url($matchInfo->teamB->shirt_img_url) }}" />
								<h1 class="pb-4 pt-3">{{ $matchInfo->teamB->team_name }}</h1>
							</div>
						</div>
					</div>


					<!-- <div class="col-12 dispay-match font-weight-bold mb-4">

					</div> -->
					<div class="col-12">
						<div class="btn-group w-100 mt-30" role="group">
						  <button type="button" id="voteHome" data-vote="{{ $matchInfo->team_a }}"@if($lastBet) @if($lastBet==$matchInfo->team_a) style="opacity: 1;" @else style="opacity: 0.3;" @endif @endif class="vote_match btn bg-danger w-100 py-4 text-white">ชนะ</button>
						  <button type="button" id="voteDraw" data-vote="0" @if($lastBet) @if($lastBet==0) style="opacity: 1; color:#000 !important;" @else style="opacity: 0.3; !important;" @endif @endif class="vote_match btn bg-white w-100 text-dark">เสมอ</button>
						  <button type="button" id="voteAway" data-vote="{{ $matchInfo->team_b }}" @if($lastBet) @if($lastBet==$matchInfo->team_b) style="opacity: 1;" @else style="opacity: 0.3;" @endif @endif class="vote_match btn bg-danger w-100 text-white">ชนะ</button>
						</div>
						<div class="d-flex justify-content-center vote-box w-100">

							<!-- <div class="predict-home w-100 bg-danger">

							</div>
							<div class="predict-draw w-100 bg-white text-dark">

							</div>
							<div class="predict-away w-100 bg-primary">
								ชนะ
							</div> -->
						</div>
						<div class="time mt-3 mb-auto pl-3 d-block d-md-none">
			                @if($time)
			                  <div class="row">
			                  	<h4 class="times-remaining mt-4 col-12">เหลือเวลาอีก</h4>
				              </div>
				              <div class="row">
				                  <div class="time-box rounded border col-10 m-auto">
				                    <span id="getting-started-2" data-time="{{ $time }}"></span>
				                  </div>
				              </div>
			                @endif
						</div>

					</div>

					<div class="col-12">
						<button type="submit" id="onVote" class="btn btn-green mt-45 btn-predict" disabled>@if(!$lastBet) ทายผล @else ทายผลอีกครั้ง @endif<!-- <br><span>({{ $total_count }})</span> --></button>
					</div>

				</div>
			</div>
		</div>

	</div>
</form>
</div>
@endsection

@section('scripts')

	<style>
	.text-dark {
		color: #000 !important;
	}
	.text-dark:hover, .text-dark:focus {
		color: #000 !important;
	}
	</style>

	<script>

	  $(function () {

	  		$('.vote_match').click(function() {

	  			$('#vote_team').val($(this).data('vote'));

					$('#onVote').prop('disabled', false);
	  		});

				$('#voteHome').click(function() {
					$('#voteDraw').fadeTo("slow" , 0.3);
					$('#voteAway').fadeTo("slow" , 0.3);
				});

				$('#voteDraw').click(function() {
					$('#voteHome').fadeTo("slow" , 0.3);
					$('#voteAway').fadeTo("slow" , 0.3);
				});

				$('#voteAway').click(function() {
					$('#voteDraw').fadeTo("slow" , 0.3);
					$('#voteHome').fadeTo("slow" , 0.3);
				});


	  });

	</script>

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
			  $("#getting-started-2").countdown($("#getting-started-2").data('time'), function(event) {
			    $(this).text(
			      event.strftime('%D วัน %H:%M:%S')
			    );
			  });
			});
		@endif
	</script>

@stop
