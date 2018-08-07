@extends('layouts.user')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
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
									กรุณากรอกข้อมูลให้ครบและถูกต้อง<br />
									ในกรณีข้อมูลผิด ผู้จัดกิจกรรมมีสิทธิ์ยกเลิกรางวัล
								</div>
								<form>
									<div class="form-group row">
										<div class="col-12 col-md-3 mb-sm-15">
											<div class="plain-select">
                                                <select>
                                                    <option value="0">คำนำหน้าชื่อ</option>
                                                    <option value="1">นาย</option>
                                                </select>
                                            </div>
										</div>
										<div class="col-12 col-md-9">
											<div class="row">
												<div class="col-12 col-md-6 mb-sm-15">
													<input type="text" class="form-control" placeholder="ชื่อ (ภาษาไทย)" value="">
												</div>
												<div class="col-12 col-md-6">
													<input type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" value="">
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6 mb-sm-15">
											<input type="text" class="form-control" placeholder="เบอร์โทรศัพท์มือถือ (เพื่อรับรหัสยืนยัน)" value="">
										</div>
										<div class="col-12 col-md-6">
											<input type="email" class="form-control" placeholder="อีเมล์" value="">
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6 mb-sm-15">
											<div class="input-group date">
												<input type="text" class="form-control datepicker" placeholder="ว/ด/ป เกิด" >
											</div>
										</div>
										<div class="col-12 col-md-6">
											<div class="plain-select">
                                                <select>
                                                    <option value="0">อาชีพ</option>
                                                </select>
                                            </div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6 mb-sm-15">
											<div class="plain-select">
                                                <select>
                                                    <option value="0">รายได้ต่อเดือน</option>
                                                </select>
                                            </div>
										</div>
										<div class="col-12 col-md-6">
											<div class="plain-select">
                                                <select>
                                                    <option value="0">เป็นแฟนทีม</option>
                                                </select>
                                            </div>
										</div>
									</div>
								</form>
								<div class="row">
									<div class="col-md-8 m-auto">
										<div class="text-center">
											<div class="btn-text border-0">(ผู้สมัครเข้าร่วมกิจกรรมต้องมีอายุ 20 ปีบริบูรณ์)</div>
										</div>
										<div class="text-center mt-30">
											<div class="form-check form-check-inline mb-15">
												<input class="form-check-input mr-10" type="checkbox" value="" id="checkCondition">
												<label class="form-check-label" for="checkCondition">
												ข้อมูลถูกต้องและยินยอมตามเงื่อนไข <a class="color-lightyellow" href="#"  data-toggle="modal" data-target="#popup">(คลิกเพื่ออ่านเงื่อนไข)</a>
												</label>
											</div>
										</div>
									</div>
									<div class="col-md-6 m-auto">
										<a class="btn btn-green" href="{{ url('/register/otp') }}">สมัครเข้าร่วมกิจกรรม</a>
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
