@extends('layouts.user')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="fullpage-wrapper register-page">

	<div class="section fp-auto-height active">
		<div class="container">

			<!-- <h1 class="h-title">เข้าสู่ระบบ</h1> -->
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-10 col-md-8 m-auto">
					<div class="box-wrapper">

						<div class="row">
							<div class="col-12 col-md-6 m-auto line-register-box pb-sm-20">

								<h1 class="text-center color-yellow mb-15">เข้าสู่ระบบ</h1>
								<form action="{{ url('/signin') }}" method="post">

									<input type="hidden" name="action" value="{{ $action }}">

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

									<div class="form-group row">
										<!-- <label class="col-md-12 col-form-label">Username</label> -->
										<div class="col-md-12">
											<input type="text" class="form-control" placeholder="Username" name="username" value="">
										</div>
									</div>
									<div class="form-group row">
										<!-- <label class="col-md-12 col-form-label">Password</label> -->
										<div class="col-md-12">
											<input type="password" class="form-control" placeholder="Password" name="password" value="">
										</div>
									</div>
									<div class="row">
										<div class="col-12 ml-auto">
											<button type="submit" class="btn btn-green mb-15">
												เข้าสู่ระบบ
											</button>
											<div class="text-center">
												<a class="btn-text" href="{{ url('/forgot') }}">ลืมรหัสผ่าน <i class="fa fa-angle-right"></i></a>
											</div>
										</div>
									</div>
								</form>

							</div>
							<div class="mt-sm-15 col-12 col-md-6">
								<h1 class="text-center color-yellow mb-15">สมัครสมาชิก</h1>
								<div class="row">
									<div class="col-12 ml-auto">
										<a class="btn btn-blue mb-15" href="{{ url('/register') }}">ลงทะเบียน</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

</div>

@endsection
