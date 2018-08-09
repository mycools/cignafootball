@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="fullpage-wrapper register-page">

@php
if (Session::has('user_id')) {
	Session::get('user_id');
}

@endphp

	<div class="section fp-auto-height active">
		<div class="container">
			<h1 class="h-title">ลงทะเบียน</h1>
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-10 col-md-8 col-lg-7 m-auto">
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
								<div class="text-center text-large font-light">รหัสยืนยัน (OTP)</div>
								<div class="text-center font-light mgb-5">
									รหัสอ้างอิง: {{ $refcode }}
								</div>
								<form role="form" name="formOtp" id="formOtp" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="refcode" value="{{ $refcode }}">
									<div class="form-group row">
										<div class="col-md-12">
											<input type="text" class="form-control gray text-center" name="otp" id="otp" placeholder="กรอกรหัสยืนยัน" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-12 text-center col-form-label">กรอกตัวเลขที่ได้รับทาง SMS ตามเบอร์ที่แจ้งไว้ให้ถูกต้อง</label>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="text-center mt-10 mt-sm-15">
												<button type="submit" class="btn btn-green mb-15">ยืนยันรหัส</button>
												{{-- <a class="btn btn-green mb-15" href="{{ url('/register/otp') }}">ยืนยันรหัส</a> --}}
												<a class="btn btn-orange" href="#">ส่งรหัสอีกครั้ง</a>
											</div>
											<div class="text-center mt-15">
												<a class="btn-text" href="{{ url('/register') }}"><i class="fa fa-angle-left"></i> ย้อนกลับ</a>
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
