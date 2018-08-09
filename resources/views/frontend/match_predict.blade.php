@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

@php
if(strtotime($matchInfo['bet_start']) <= strtotime('now')) {

	$time = $matchInfo['bet_end'];
} else if(strtotime($matchInfo['bet_end']) >= strtotime('now')) {

	$time = $matchInfo['bet_end'];
} else {

	$time = "";
}
@endphp

<link rel="stylesheet" type="text/css" href="/css/match.css" />

<form name="match_select" id="match_select" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="vote_team" id="vote_team">
	<div class="match-page" id="match-predict">
		<div class="container match-predict">
			<div class="card-match mt-4 p-2 pb-4">
				<div class="row">
					<div class="col-12">
						<h3 class="match-page-title text-uppercase">match of the weeks<br><span class="f-5 text-white">{{ Carbon\Carbon::parse($matchInfo->match_start)->format('d-M') }} - {{ Carbon\Carbon::parse($matchInfo->match_end)->format('d-M') }}</span></h3>
					</div>
					<div class="col-12">
						<div class="d-flex justify-content-around block-vote">
							<div class="home">
								<img class="kits" src="{{ \Storage::url($matchInfo->teamA->shirt_img_url) }}" />
								<h1 class="pb-4 pt-3">{{ $matchInfo->teamA->team_name }}</h1>
							</div>
							<div class="time mt-3 mb-auto pl-3">
								@if($time)
									<h4 class="times-remaining mt-4">เหลือเวลาอีก</h4>
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
						<div class="btn-group w-100" role="group">
						  <button type="button" id="voteHome" data-vote="{{ $matchInfo->team_a }}" class="vote_match btn bg-danger w-100 py-4 text-white">ชนะ</button>
						  <button type="button" id="voteDraw" data-vote="0" class="vote_match btn bg-white w-100 text-dark">เสมอ</button>
						  <button type="button" id="voteAway" data-vote="{{ $matchInfo->team_b }}" class="vote_match btn bg-primary w-100 text-white">ชนะ</button>
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

					</div>

					<div class="col-12">
						<button type="submit" id="onVote" class="btn btn-green mt-4 btn-predict">ทายผล<br><span>({{ $matchInfo->bet_total_count }})</span></button>
					</div>

				</div>
			</div>
		</div>

	</div>
</form>

@endsection

@section('scripts')

	<script>

	  $(function () {

	  		$('.vote_match').click(function() {

	  			$('#vote_team').val($(this).data('vote'));
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
			      event.strftime('%H:%M:%S')
			    );
			  });
			});
		@endif
	</script>

@stop
