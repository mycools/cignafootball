@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="register-page non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">ข้อมูลส่วนตัว</h1>

			<div class="row mt-20 mb-15">
				<div class="col-12 m-auto">
					<div class="box-wrapper bg-lightgray color-gray pt-sm-20">

						<div class="row justify-content-md-center">
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">ชื่อ</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
											กันติภัทร์
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">นามสกุล</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
											จิตบุณฑ์
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">Username</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
											Godzilla99
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">ทีมที่ชอบ</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
											Manchester United
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			 <div class="row justify-content-center mb-15">
				<div class="col-12 col-md-3">
					<div class="box bg-blue">

					</div>
				</div>
				<div class="col-12 col-md-9">
					<div class="box bg-green">

					</div>
				</div>
			</div>

			<div class="row justify-content-center mb-15">
				<div class="col-12 col-md-3">
					<div class="box bg-darkorange">

					</div>
				</div>
				<div class="col-12 col-md-9">
					<div class="box bg-midgray">

					</div>
				</div>
			</div>

		</div>
	</div>

</div>
<div class="modal fade" id="popup" tabindex="-1">
    <div class="modal-dialog centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-4 pl-30 pr-30">
                <!-- <span aria-hidden="true" class="close" data-dismiss="modal">&times;</span> -->
                <div class="head-title">
                    <span>เงื่อนไข</span>
                </div>
                <div class="detail">
                    1.<br />
                    2.<br />
                    3.<br />
                    4.<br />
                    5.<br />
                    6.<br />
                    7.<br />
                    8.<br />
                </div>
                <div class="footer text-center">
                    <a class="btn btn-blue color-white" data-dismiss="modal">ปิด</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
