@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')
<link rel="stylesheet" type="text/css" href="/css/match.css" />

<div class="match-page">
	<div class="container match-predict">
		<div class="card-match mt-4 p-2 pb-4">
			<div class="row">
				<div class="col-12">
					<h3 class="match-page-title text-uppercase">match of the weeks</h3>
					<span>23 Aug - 2 Sep</span>
				</div>
				<div class="col-12">
					<div class="d-flex justify-content-around block-vote">
						<div class="home">
							<img class="kits" src="{{ url('images/kits/sh_manchester_united.png') }}" />
							<h1>Manchester united</h1>
						</div>
						<div class="time mb-auto">
							<h4 class="times-remaining mt-4">เหลือเวลาอีก</h4>
							<div class="time-box rounded border">
								<span>33:20:01</span>
							</div>
						</div>
						<div class="away">
							<img class="kits" src="{{ url('images/kits/sh_tottenhem.png') }}" />
							<h1>Tottemham Hotspur</h1>
						</div>
					</div>
				</div>


				<!-- <div class="col-12 dispay-match font-weight-bold mb-4">

				</div> -->
				<div class="col-12">
					<div class="btn-group w-100" role="group">
					  <button type="button" id="voteHome" class="btn bg-danger w-100 py-4 text-white">ชนะ</button>
					  <button type="button" id="voteDraw" class="btn bg-white w-100 text-dark">เสมอ</button>
					  <button type="button" id="voteAway" class="btn bg-primary w-100 text-white">ชนะ</button>
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
					<button type="button" id="onVote" class="btn btn-green mt-4 btn-predict rounded">ทายผล<br>(22,112)</button>
				</div>

			</div>
		</div>
	</div>

</div>

@endsection
