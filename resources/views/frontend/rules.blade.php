@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="rules-page non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">RULES</h1>

			<div class="row justify-content-center mb-45">
				<div class="col-12 mb-sm-15">
					<div class="box-wrapper">

						
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
							

					</div>
				</div>
				</div>
			</div>

		</div>
	</div>

</div>
@endsection
