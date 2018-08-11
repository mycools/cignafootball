@extends('layouts.user')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="fullpage-wrapper register-page">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">ลงทะเบียน</h1>
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-10 col-md-10 col-lg-8 m-auto">
					<div class="box-wrapper">
						<div class="row">
							<div class="col-11 col-md-10 col-lg-8 m-auto">
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
								@endif
								<div class="text-center text-large font-light mb-30">กรุณากำหนดชื่อผู้ใช้และรหัสผ่าน</div>
								<form role="form" name="formUser" id="formUser" method="post">
									{{ csrf_field() }}
									<div class="form-group row">
										<label class="col-md-3 text-md-right pr-0 col-form-label">Username</label>
										<div class="col-md-9">
											<input type="text" class="form-control" name="username" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 text-md-right pr-0 col-form-label">Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" name="password" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 text-md-right pr-0 col-form-label">Re-Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" name="password_confirmation" value="">
										</div>
									</div>
									<div class="row">
										<div class="col-md-9 ml-auto">
											<div class="text-center mt-20 mt-sm-45">
												<button type="submit" class="btn btn-green">สมัครเข้าร่วมกิจกรรม</button>
												{{-- <a class="btn btn-green" href="#">สมัครเข้าร่วมกิจกรรม</a> --}}
											</div>
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

</div>

@endsection
