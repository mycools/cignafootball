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
						</div>
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">Username</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
											{{ $result->username }}
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-5">
								<div class="form-group row mb-sm-10">
									<label class="col-md-3 text-md-right pr-0 col-form-label font-med">ทีมที่ชอบ</label>
									<div class="col-md-9">
										<div class="form-control-plaintext text-center">
										    {{ $team->team_name }}
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			 <div class="row justify-content-center mb-15">
				<div class="col-12 col-md-4 mb-sm-15">
					<div class="box bg-blue">
						<div class="row justify-content-center align-items-center">
							<div class="col-3 col-sm-2 col-md-3 pr-0"><img class="w-100" src="{{ url('images/icon/icon_trophy.png') }}" /></div>
							<div class="col-9 col-sm-10 col-md-9 text-center pdt-5">
								Ranking
								<div class="text-large">123 / 23,953</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-8 d-md-flex">
					<div class="box bg-green pt-25 pt-md-12">
						<div class="row justify-content-center align-items-center">
							<div class="col-4 col-md-2 text-center">
								<i class="fa fa-check-circle mgr-5" aria-hidden="true"></i> ถูก
								<div class="text-large">120</div>
							</div>
							<div class="col-4 col-md-2 bdl-1 bdr-1 text-center">
								<i class="fa fa-times-circle mgr-5" aria-hidden="true"></i> ผิด
								<div class="text-large">120</div>
							</div>
							<div class="col-4 col-md-2 text-center">
								ทาย
								<div class="text-large">120</div>
							</div>
							<div class="col-12 col-md-6 text-center mt-sm-15">
								<a class="btn btn-border green pt-10 pb-10" href="#">Full History</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mb-15">
				<div class="col-12 col-md-4 mb-sm-15">
					<div class="box bg-darkorange">
						<div class="row justify-content-center align-items-center">
							<div class="col-3 col-sm-2 col-md-3 pr-0"><img class="w-100" src="{{ url('images/icon/icon_lot.png') }}" /></div>
							<div class="col-9 col-sm-10 col-md-9 text-center pdt-5">
								สิทธิ์จับสลาก
								<div class="text-large">120</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-8 d-md-flex">
					<div class="box bg-midgray pt-25 pt-md-20">
						<div class="row justify-content-center align-items-center">
							<div class="col-3 col-md-3 col-lg-2 text-left pr-0 pr-md-15">
								ชวนเพื่อน <br  />
								เพื่อเพิ่มสิทธิ์
							</div>
							<div class="col-9 col-md-6 col-lg-8 text-center">
								<input type="text" class="form-control pt-10 pb-10" value="http://......">
							</div>
							<div class="col-12 col-md-3 col-lg-2 text-center">
								<a class="btn btn-border gray pt-10 pb-10 mt-sm-15" href="#">Copy</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row justify-content-center mb-45">
				<div class="col-12 mb-sm-15">
					<div class="box-wrapper">

						<form action="{{ url('/forgot_password') }}" method="post">

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
									  <ul style="padding-left: 20px;">
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
