@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="register-page non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">ลงทะเบียน</h1>
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-10 col-md-10 col-lg-8 m-auto">
					<div class="box-wrapper pt-30 pb-30">

						<div class="row">
							<div class="col-12 col-md-11 m-auto">
								<div class="text-center font-light mb-30">
									กรุณากรอกข้อมูลให้ครบและถูกต้อง<br/>
									ในกรณีข้อมูลผิด ผู้จัดกิจกรรมมีสิทธิ์ยกเลิกรางวัล
								</div>
                                {{--FIXME edit from and post value to route--}}
                                <form method="post" enctype="multipart/form-data" action="{{ route('user.submit_registration') }}">
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
                                            	@php

// dd($errors->all());
                                            	@endphp
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="form-group row">
										<div class="col-12 col-md-3 mb-sm-15">
											<div class="plain-select">
                                                {{--FIXME edit value from db--}}
                                                <select name="title_id" id="title_id" required>
                                                    <option value="">เลือกคำนำหน้า</option>
                                                    @foreach($titles as $title)
                                                        <option value={{ $title->id }} {{ (old("title_id") == $title->id ? "selected":"") }}>{{ $title->title_name_th }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
										<div class="col-12 col-md-9">
											<div class="row">
												<div class="col-12 col-md-6 mb-sm-15">
													<input name ="first_name" type="text" class="form-control" placeholder="ชื่อ (ภาษาไทย)" value="{{ old('first_name') }}" required>
												</div>
												<div class="col-12 col-md-6">
													<input name ="last_name" type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" value="{{ old('last_name') }}" required>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6 mb-sm-15">
											<input name="phoneno" type="text" class="form-control" placeholder="เบอร์โทรศัพท์มือถือ (เพื่อรับรหัสยืนยัน)" value="{{ old('phoneno') }}" required>
										</div>
										<div class="col-12 col-md-6">
											<input name="email" type="email" class="form-control" placeholder="อีเมล์" value="{{ old('email') }}" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6 mb-sm-15">
											<div class="input-group date">
												<input name="birthdate" type="text" class="form-control datepicker" placeholder="ว/ด/ป เกิด" required>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="plain-select">
                                                {{--FIXME edit value from db--}}
                                                <select name="occupation_id" required>
                                                    <option value="" >เลือกอาชีพ</option>
                                                    @foreach($occupations as $occupation)
                                                        <option value={{ $occupation->id }} {{ (old("occupation_id") == $occupation->id ? "selected":"") }}>{{ $occupation->occupation_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6 mb-sm-15">
											<div class="plain-select">
                                                {{--FIXME edit value from db--}}
                                                <select name="salary_id" required>
                                                    <option value="" >เลือกระดับเงินเดือน</option>
                                                    @foreach($salaries as $salary)
                                                        <option value={{$salary->id}} {{ (old("salary_id") == $salary->id ? "selected":"") }}>{{$salary->salary_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
										<div class="col-12 col-md-6">
											<div class="plain-select">
                                                {{--FIXME edit value from db--}}
                                                <select name ="team_id" required>
                                                    <option value="" >เลือกทีมที่ชอบ</option>
                                                    @foreach($teams as $team)
                                                        <option value={{$team->id}} {{ (old("team_id") == $team->id ? "selected":"") }}>{{$team->team_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
									</div>
								<div class="row">
									<div class="col-md-8 m-auto">
										<div class="text-center">
											<div class="btn-text border-0">(ผู้สมัครเข้าร่วมกิจกรรมต้องมีอายุ 20 ปีบริบูรณ์)</div>
										</div>
										<div class="text-center mt-30">
											<div class="form-check form-check-inline mb-15">
												<input class="form-check-input mr-10" type="checkbox" value="1" id="checkCondition" onchange="isChecked(this, 'sub')">
												<label class="form-check-label" for="checkCondition">
												ข้อมูลถูกต้องและยินยอมตามเงื่อนไข <a class="color-lightyellow" href="#"  data-toggle="modal" data-target="#popup">(คลิกเพื่ออ่านเงื่อนไข)</a>
												</label>
											</div>
										</div>
									</div>
                                    {{--FIXME add button in form--}}
									<div class="col-md-6 m-auto">
										<button class="btn btn-green" href="{{ url('/register/otp') }}" id="sub" disabled>สมัครเข้าร่วมกิจกรรม</button>
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
<div class="modal fade" id="popup" tabindex="-1">
    <div class="modal-dialog modal-lg centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-4 pl-30 pr-30">
                <!-- <span aria-hidden="true" class="close" data-dismiss="modal">&times;</span> -->
                <div class="head-title">
                    <h3 class="color-darkgray">เงื่อนไข เกณฑ์การตัดสิน และการแจกจ่ายสิ่งของรางวัลอย่างไร ?</h3>
                </div>
                <div class="detail">
					<div class="p mb-30 text-small">
						@include('frontend.components.condition')
					</div>
                </div>
                <div class="footer text-center">
                    <a class="btn btn-blue color-white" data-dismiss="modal">ปิด</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function isChecked(checkbox, sub) {
	    var button = document.getElementById(sub);

	    if (checkbox.checked === true) {
	        button.disabled = "";
	    } else {
	        button.disabled = "disabled";
	    }
	}
</script>
@endsection
