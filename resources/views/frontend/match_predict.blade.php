@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')
<link rel="stylesheet" type="text/css" href="/css/match.css" />

<form name="match_select" id="match_select" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="vote_team" id="vote_team">
	<div class="match-page" id="match-predict">
		<div class="container match-predict">
			<div class="card-match mt-4 p-2 pb-4">
				<div class="row">
					<div class="col-12">
						<h3 class="match-page-title text-uppercase">match of the weeks<br><span class="f-5 text-white">23 Aug - 2 Sep</span></h3>
					</div>
					<div class="col-12">
						<div class="d-flex justify-content-around block-vote">
							<div class="home">
								<img class="kits" src="{{ url('images/kits/sh_manchester_united.png') }}" />
								<h1 class="pb-4 pt-3">Manchester united</h1>
							</div>
							<div class="time mt-3 mb-auto pl-3">
								<h4 class="times-remaining mt-4">เหลือเวลาอีก</h4>
								<div class="time-box rounded border">
									<span>33:20:01</span>
								</div>
							</div>
							<div class="away">
								<img class="kits" src="{{ url('images/kits/sh_tottenhem.png') }}" />
								<h1 class="pb-4 pt-3">Tottemham Hotspur</h1>
							</div>
						</div>
					</div>


					<!-- <div class="col-12 dispay-match font-weight-bold mb-4">

					</div> -->
					<div class="col-12">
						<div class="btn-group w-100" role="group">
						  <button type="button" id="voteHome" data-vote="1" class="vote_match btn bg-danger w-100 py-4 text-white">ชนะ</button>
						  <button type="button" id="voteDraw" data-vote="0" class="vote_match btn bg-white w-100 text-dark">เสมอ</button>
						  <button type="button" id="voteAway" data-vote="2" class="vote_match btn bg-primary w-100 text-white">ชนะ</button>
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
						<button type="submit" id="onVote" class="btn btn-green mt-4 btn-predict">ทายผล<br><span>(22,112)</span></button>
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

@stop