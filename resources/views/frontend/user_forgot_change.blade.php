@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="fullpage-wrapper register-page">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">เปลี่ยนรหัสผ่าน</h1>
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-12 m-auto">
					<div class="box-wrapper">

						<form action="{{ url('/submit_forgot_password') }}" method="post">

							{{ csrf_field() }}

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

							<div class="col-12 col-lg-10 col-xl-8 m-auto">
								<div class="form-group row">
									<label class="col-md-3 text-md-right pr-0 col-form-label">E-mail</label>
									<div class="col-md-9">
										<input type="email" class="form-control" name="email" value="">
									</div>
								</div>
								{{--<div class="form-group row">--}}
									{{--<label class="col-md-3 text-md-right pr-0 col-form-label">Password</label>--}}
									{{--<div class="col-md-9">--}}
										{{--<input type="password" class="form-control" name="current_password" value="">--}}
									{{--</div>--}}
								{{--</div>--}}
                                <input name="remember_token" type="hidden" value="{{$_GET['remember_token']}}">
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
									<button type="submit" class="btn btn-border gray pt-10 pb-10 mt-sm-30">
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

@endsection
