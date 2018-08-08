@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="fullpage-wrapper register-page">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">เข้าสู่ระบบ</h1>
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-10 col-md-8 col-lg-7 m-auto">
					<div class="box-wrapper">

						<div class="row">
							<div class="col-11 col-md-10 col-lg-8 m-auto">

								<form action="{{ url('/signin') }}" method="post">

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
									<div class="row">
										<div class="col-md-9 ml-auto">
											<div class="text-center mt-20 mt-sm-30 row">
												<div class="col-12 col-sm-6 pl-xs-15 pr-xs-15 pdr-5">
													<a class="btn btn-blue mb-15" href="{{ url('/register') }}">ลงทะเบียน</a>
												</div>
												<div class="col-12 col-sm-6 pl-xs-15 pr-xs-15 pdl-5">
													<button type="submit" class="btn btn-green mb-15">
														เข้าสู่ระบบ
													</button>
												</div>
											</div>
											<div class="text-center">
												<a class="btn-text" href="{{ url('/forgot') }}">ลืมรหัสผ่าน <i class="fa fa-angle-right"></i></a>
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
