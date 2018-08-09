@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="fullpage-wrapper register-page">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">ลืมรหัสผ่าน</h1>
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-10 col-md-8 col-lg-7 m-auto">
					<div class="box-wrapper">

						<div class="row">
							<div class="col-11 col-md-10 col-lg-8 m-auto">

                                <form method="post" enctype="multipart/form-data" action="{{ route('user.sentEmailForgotPassword') }}">
                                    {{ csrf_field() }}
									<div class="form-group row">
										<label class="col-md-3 text-md-right pr-0 col-form-label">E-mail</label>
										<div class="col-md-9">
											<input name="email" type="email" class="form-control" value="" required>
										</div>
									</div>

								<div class="row">
									<div class="col-md-9 ml-auto">
										<div class="text-center mt-15">
											<button class="btn btn-green" type ="submit">ยืนยัน</button>
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
