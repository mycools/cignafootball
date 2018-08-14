@extends('layouts.user')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page bg_profile non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">ข้อมูลส่วนตัว</h1>

			<div class="row mt-20 mb-15">
				<div class="col-12 m-auto">
					<div class="box-wrapper bg-lightgray color-gray pt-20 pb-20">

						<!-- <div class="row justify-content-md-center">
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">ชื่อ</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
											{{ $result->first_name }}
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">นามสกุล</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
											{{ $result->last_name }}
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<div class="row justify-content-md-center pl-15 pr-15">
							<div class="col-12 col-md-4">
								<div class="form-group row mb-sm-10">
									<label class="col-md-12 pr-0 col-form-label font-med">ชื่อ</label>
									<div class="col-md-12">
										<div class="form-control-plaintext text-center">
											{{ $result->first_name }}
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-4">
								<div class="form-group row mb-sm-10">
									<label class="col-md-12 pr-0 col-form-label font-med">Username</label>
									<div class="col-md-12">
										<div class="form-control-plaintext text-center">
											{{ $result->username }}
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-4">
								<div class="form-group row mb-sm-10">
									<label class="col-md-12 pr-0 col-form-label font-med">ทีมที่ชอบ</label>
									<div class="col-md-12">
										<div class="form-control-plaintext text-center">
										    {{ (!empty($team->team_name) ? $team->team_name : '-') }}
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			 <div class="row justify-content-center mb-15">
				<div class="col-12 col-md-4 mb-xs-15 mb-sm-0">
					<div class="box bg-blue">
						<div class="row justify-content-center align-items-center">
							<div class="col-3 col-sm-2 col-md-3 pr-0"><img class="w-100" src="{{ url('images/icon/icon_trophy.png') }}" /></div>
							<div class="col-9 col-sm-10 col-md-9 text-center pdt-5">
								Ranking
								<div class="text-large">{{ ($result->getRank->ranking_no == 0 ? '-' : $result->getRank->ranking_no.'/'.$allrank) }}</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-8 d-md-flex">
					<div class="box bg-green pt-25 pt-md-12 pt-sm-0 pb-sm-0">
						<div class="row justify-content-center align-items-center">
							<div class="col-4 col-md-2 text-center mt-15">
								<i class="fa fa-check-circle mgr-5" aria-hidden="true"></i> ถูก
								<div class="text-large">{{ ($result->getRank ? $result->getRank->win_count : '' ) }}</div>
							</div>
							<div class="col-4 col-md-2 bdl-1 bdr-1 text-center mt-15">
								<i class="fa fa-times-circle mgr-5" aria-hidden="true"></i> ผิด
								<div class="text-large">{{ ($result->getRank ? $result->getRank->lose_count : '' ) }}</div>
							</div>
							<div class="col-4 col-md-2 text-center mt-15">
								ทาย
								<div class="text-large">{{ ($result->getRank ? $result->getRank->predict_count : '' ) }}</div>
							</div>
							<div class="col-12 col-md-6 text-center mt-10">
								<a class="btn btn-border green pt-10 pb-10 d-block mb-xs-10 mb-sm-0" href="{{ url('/profile/history') }}">Full History</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mb-15">
				<div class="col-12 col-md-4 mb-xs-15 mb-sm-0">
					<div class="box bg-darkorange">
						<div class="row justify-content-center align-items-center">
							<div class="col-3 col-sm-2 col-md-3 pr-0"><img class="w-100" src="{{ url('images/icon/icon_lot.png') }}" /></div>
							<div class="col-9 col-sm-10 col-md-9 text-center pdt-5">
								สิทธิ์จับสลาก
								<div class="text-large">{{ ($result->getRank ? $result->getRank->point : '' ) }}</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-8 d-md-flex">
					<div class="box bg-midgray pt-25 pt-md-20 pt-sm-10">
						<div class="row justify-content-center align-items-center">
							<div class="col-3 col-md-3 col-lg-2 text-left pr-0 pr-md-15">
								ชวนเพื่อน <br  />
								เพื่อเพิ่มสิทธิ์
							</div>
							<div class="col-9 col-md-6 col-lg-8 text-center">
								<input id="myInvite" type="text" class="form-control pt-10 pb-10" value="{{ url('register/'.$inviteUrl) }}">
								{{-- <input type="text" class="form-control pt-10 pb-10" value="http://matchoftheweek.com/register/{{ $inviteUrl }}"> --}}
							</div>
							<div class="col-12 col-md-3 col-lg-2 text-center">
								<a class="btn btn-border gray pt-0 pb-0 mt-sm-15 d-block btn-copy" onclick="copyToCliboardProfile()" href="javascript:;">Copy</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mb-45">
				<div class="col-12">
					<div class="box-wrapper mb-xs-15">

						<form action="{{ url('/change_password') }}" method="post">

							{{ csrf_field() }}
							<div class="col-12 col-lg-10 col-xl-8 m-auto">
								@if(Session::has('flash_messages'))
									@php
										$flash_messages = Session::get('flash_messages');
									@endphp
									<div class="alert alert-{{$flash_messages['status']}}">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										  <span aria-hidden="true">×</span>
										</button>
										{{$flash_messages['messages']}}
									</div>
								@elseif ($errors->any())
									<div class="alert alert-danger">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">×</span>
									  </button>
									  <ul style="padding-left: 20px; margin-bottom: 0;">
									    @foreach ($errors->all() as $error)
									      <li>
									        {{ $error }}
									      </li>
									    @endforeach
									  </ul>
									</div>
								@endif
								<div class="form-group row">
									<label class="col-md-3 text-md-right pr-0 col-form-label">Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" name="current_password" value="">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 text-md-right pr-0 col-form-label">New Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" name="password" value="">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-md-3 text-md-right pr-0 col-form-label">Retype New Password</label>
									<div class="col-md-9">
										<input type="password" class="form-control" name="password_confirmation" value="">
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-10 col-xl-8 m-auto">
								<div class="col-12 col-md-6 ml-auto p-0">
									<button type="submit" class="btn btn-border gray pt-10 pb-10 mt-sm-30 d-block w-100">
										เปลี่ยน Password
									</button>
								</div>
							</div>

						</form>

					</div>
				</div>
				</div>
			</div>

		</div>
	</div>

</div>
@endsection
