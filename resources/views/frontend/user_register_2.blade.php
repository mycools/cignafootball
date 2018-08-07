@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
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

								<form>
									<div class="form-group row">
										<label class="col-md-3 text-md-right pr-0 col-form-label">Username</label>
										<div class="col-md-9">
											<input type="text" class="form-control" value="">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-md-3 text-md-right pr-0 col-form-label">Password</label>
										<div class="col-md-9">
											<input type="password" class="form-control" value="">
										</div>
									</div>
								</form>
								<div class="row">
									<div class="col-md-9 ml-auto">
										<div class="text-center mt-25 mt-sm-45">
												<a class="btn btn-green" href="#">เข้าสู่ระบบ</a>
										</div>
										<div class="text-center mt-15">
											<a class="btn-text" href="#">ลืมบัญชี และรหัสผ่าน <i class="fa fa-angle-right"></i></a>
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

</div>

@endsection
