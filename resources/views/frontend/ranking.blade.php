@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrappage-page bg_ranking non-fullpage ranking-page">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title mt-sm-45 mb-15 text-left">USER RANKING</h1>

			<div style="overflow: auto;">
				<div class="row justify-content-center mb-45 mb-sm-30" style="min-width: 550px;">
					<div class="col-12 col-md-8 mr-auto">
						<div class="ranking-head row ml-0 mr-0 pl-45">
							<div class="number"><img class="mgt-5" style="height: 27px;" src="{{ url('images/icon/icon_trophy.png') }}" /></div>
							<div class="col-6 p-0">ชื่อ</div>
							<div class="col-2 p-0">ทายทั้งหมด</div>
							<div class="col-1 p-0">ถูก</div>
							<div class="col-1 p-0">ผิด</div>
							<div class="col-2 p-0">ชวนเพื่อน</div>
							<!-- <div class="col-2 p-0">สิทธิ์จับฉลาก</div> -->
						</div>
						<div class="ranking-list">
							@if (isset($result))
		                        @php
		                          $i=1;
		                        @endphp
	                        	@foreach ($result as $row)
								<div class="row-item row ml-0 mr-0 @if($user_id === $row->user_id) active @endif">
									<div class="number">{{ $i }}</div>
									
									<div class="col-6 p-0">
										{{ ($row->username ? $row->username : '' ) }} 
									</div>
									<div class="col-2 text-center p-0">{{ ($row ? $row->predict_count : '' ) }}</div>
									<div class="col-1 text-center p-0">{{ ($row ? $row->win_count : '' ) }}</div>
									<div class="col-1 text-center p-0">{{ ($row ? $row->lose_count : '' ) }}</div>
									<div class="col-2 text-center p-0">{{ ($row ? $row->invitee_count : '' ) }}</div>
									<!-- <div class="col-2 text-center p-0">{{ ($row ? $row->point : '' ) }}</div> -->
								</div>
								@php
									$i++;
								@endphp
								@endforeach
							@endif
						</div>
					</div>
				</div>
			</div>

			@include('frontend.components.home-share')

		</div>
	</div>


</div>
@endsection
