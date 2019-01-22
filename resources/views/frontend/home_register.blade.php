@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')


<div class="wrappage-page bg_home non-fullpage home-page home-register-page">

	<div class="section fp-auto-height active section-home-register">
		<div class="home-banner">
			<a href="{{ url('match') }}">
				<!-- <img class="d-none d-sm-block" src="{{ url('images/home/bg_register.jpg') }}" /> -->
				<img class="d-block d-md-none" src="{{ url('images/home/bg_register_mobile.jpg') }}" />
	  		</a>
		</div>
		<div class="container">

			<div class="row justify-content-start align-items-center">
				<div class="col-12 col-md-6 col-lg-5 pt-0 pt-md-4">
					<div class="register-box">
						<h1 class="h-title color-blue">ลงทะเบียน</h1>
						<div class="text-center mb-15" style="line-height: 1.2;">
							กรุณากรอกข้อมูลให้ครบและถูกต้อง<br/>
							ในกรณีข้อมูลผิด ผู้จัดกิจกรรมมีสิทธิ์ยกเลิกรางวัล
						</div>

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
                                        @foreach ($errors->all() as $error)
                                            <li>
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row">
								<div class="col-12 mb-15">
									<div class="custom-select">
                                        {{--FIXME edit value from db--}}
                                        <select name="title_id" id="title_id" required>
                                            <option value="">เลือกคำนำหน้า</option>
                                            @foreach($titles as $title)
                                                <option value={{ $title->id }} {{ (old("title_id") == $title->id ? "selected":"") }}>{{ $title->title_name_th }}</option>
                                            @endforeach
                                        </select>
                                    </div>
								</div>
								<div class="col-12 col-md-6 mb-sm-15">
									<input name ="first_name" type="text" class="form-control" placeholder="ชื่อ (ภาษาไทย)" value="{{ old('first_name') }}" required>
								</div>
								<div class="col-12 col-md-6">
									<input name ="last_name" type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" value="{{ old('last_name') }}" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<input name="phoneno" type="text" class="form-control" placeholder="เบอร์โทรศัพท์มือถือ (เพื่อรับรหัสยืนยัน)" value="{{ old('phoneno') }}" maxlength="10" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<input name="email" type="email" class="form-control" placeholder="อีเมล์" value="{{ old('email') }}" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<div class="row">
										<div class="col-4">
											<div class="custom-select">
												<select name="day" required>
                                                    <option value="" >วัน</option>
                                                    @foreach(range(1,31) as $day)
													<option value="{{strlen($day)==1 ? '0'.$day : $day}}">
														{{strlen($day)==1 ? '0'.$day : $day}}
													</option>
												    @endforeach
                                                </select>
                                            </div>
										</div>
										<div class="col-4 pl-0">
											<div class="custom-select">
												<select id="month" name="month" required>
                                                    <option value="" >เดือน</option>
                                                    @foreach(range(1,12) as $month)
													<option value="{{$month}}">
														{{date("M", strtotime('2018-'.$month))}}
													</option>
													@endforeach
                                                </select>
                                            </div>
										</div>
										<div class="col-4 pl-0">
											<div class="custom-select">
												<select name="year" required>
                                                    <option value="" >ปี</option>
													@for ($year = date('Y') - 19; $year > date('Y') - 100; $year--)
													<option value="{{$year}}">
													    {{$year}}
													</option>
													@endfor
                                                </select>
                                            </div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12 col-md-6 mb-sm-15">
									<div class="custom-select">
                                        {{--FIXME edit value from db--}}
                                        <select name="occupation_id" required>
                                            <option value="" >เลือกอาชีพ</option>
                                            @foreach($occupations as $occupation)
                                                <option value={{ $occupation->id }} {{ (old("occupation_id") == $occupation->id ? "selected":"") }}>{{ $occupation->occupation_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
								</div>
								<div class="col-12 col-md-6">
									<div class="custom-select">
                                        {{--FIXME edit value from db--}}
                                        <select name="salary_id" required>
                                            <option value="" >เลือกระดับเงินเดือน</option>
                                            @foreach($salaries as $salary)
                                                <option value={{$salary->id}} {{ (old("salary_id") == $salary->id ? "selected":"") }}>{{$salary->salary_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<div class="custom-select">
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
								<div class="col-12 m-auto">
									<div class="text-center">
										<div class="btn-text color-darkred border-0">(ผู้สมัครเข้าร่วมกิจกรรมต้องมีอายุ 20 ปีบริบูรณ์)</div>
									</div>
									<div class="text-center">
										<div class="form-check form-check-inline" style="line-height: 1.2;">
											<input class="form-check-input mr-10" type="checkbox" value="1" id="checkCondition" onchange="isChecked(this, 'sub')">
											<label class="form-check-label" for="checkCondition">
											ข้อมูลถูกต้องและยินยอมตามเงื่อนไข
											</label>
										</div>
										<a class="d-block mb-15" style="line-height: 1.2;" href="#"  data-toggle="modal" data-target="#popup">(คลิกเพื่ออ่านเงื่อนไข)</a>
									</div>
								</div>
	                            {{--FIXME add button in form--}}
								<div class="col-12 col-md-6 m-auto">
									<button class="btn btn-green mb-15 w-100" href="{{ url('/register/otp') }}" id="sub">สมัครเข้าร่วมกิจกรรม</button>
								</div>
							</div>
	                    </form>

					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-7 pt-0">
					<img class="d-none d-md-block w-100" src="{{ url('images/home/text_register.png') }}" />
				</div>
			</div>

		</div>
	</div>

	<div class="home-ranking">
		<div class="btn btn-blue open-list">
			<img src="{{ url('images/icon/icon_trophy.png') }}" />
		</div>
		<div class="ranking-head">
			USER TOP 10 RANKING
		</div>
		<div class="ranking-list">
			@if (isset($result))
                @php
                  $i=1;
                @endphp
            	@foreach ($result as $row)
            	<div class="row-item">
					<div class="number">{{ $i }}</div>
					{{ ($row->getUser ? $row->getUser->username : '' ) }} 
				</div>
				@php
					$i++;
				@endphp
				@endforeach
			@endif
		</div>
	</div>
</div>
<div class="modal fade" id="popup" tabindex="-1">
    <div class="modal-dialog modal-lg centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-4 pl-30 pr-30">
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
@endsection
