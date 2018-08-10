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
                                                <select name ="title_id" required>
                                                    <option value="1">เลือกคำนำหน้า</option>
                                                    @foreach($titles as $title)
                                                        <option value={{$title->id}}>{{$title->title_name_th}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
										<div class="col-12 col-md-9">
											<div class="row">
												<div class="col-12 col-md-6 mb-sm-15">
													<input name ="first_name" type="text" class="form-control" placeholder="ชื่อ (ภาษาไทย)" value="" required>
												</div>
												<div class="col-12 col-md-6">
													<input name ="last_name" type="text" class="form-control" placeholder="นามสกุล (ภาษาไทย)" value="" required>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-12 col-md-6 mb-sm-15">
											<input name="phoneno" type="text" class="form-control" placeholder="เบอร์โทรศัพท์มือถือ (เพื่อรับรหัสยืนยัน)" value="" required>
										</div>
										<div class="col-12 col-md-6">
											<input name="email" type="email" class="form-control" placeholder="อีเมล์" value="" required>
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
                                                    <option value="1" >เลือกอาชีพ</option>
                                                    @foreach($occupations as $occupation)
                                                        <option value={{$occupation->id}}>{{$occupation->occupation_name}}</option>
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
                                                    <option value="1" >เลือกระดับเงินเดือน</option>
                                                    @foreach($salaries as $salary)
                                                        <option value={{$salary->id}}>{{$salary->salary_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
										</div>
										<div class="col-12 col-md-6">
											<div class="plain-select">
                                                {{--FIXME edit value from db--}}
                                                <select name ="team_id" required>
                                                    <option value="1" >เลือกทีมที่ชอบ</option>
                                                    @foreach($teams as $team)
                                                        <option value={{$team->id}}>{{$team->team_name}}</option>
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
						<span class="d-inline-block" style="width: 20px;">1.</span> ผู้ร่วมกิจกรรมจะต้องมีสัญชาติไทย โดยมีภูมิลำเนาอยู่ในประเทศไทยเท่านั้น และมีอายุ 20 ปีบริบูรณ์ ขึ้นไป
						<br /><span class="d-inline-block" style="width: 20px;">2.</span> ผู้ร่วมรายการ 1 ท่าน สามารถสมัครสมาชิกได้เพียงครั้งเดียว
						<br /><span class="d-inline-block" style="width: 20px;">3.</span> ผู้ร่วมกิจกรรมต้องกรอกข้อมูลตามที่กำหนด (ชื่อ-สกุล , อายุ , อีเมลล์ , หมายเลขโทรศัพท์มือถือ) ในกรณีผู้จัดกิจกรรมตรวจสอบพบว่าข้อมูลที่กรอกในการสมัครสมาชิกไม่ตรงความเป็นจริง หรือสมัครสมาชิกมากกว่า 1 ครั้ง บริษัทฯ ขอสงวนสิทธิ์ในการเพิกถอนสิทธิ์การรับรางวัลในทุกกรณี
						<br /><span class="d-inline-block" style="width: 20px;">4.</span> บริษัทฯ ขอสงวนสิทธิ์ในการปิดหรือระงับบัญชีผู้เล่นได้โดยไม่ต้องแจ้งให้ทราบล่วงหน้า ในกรณีที่บริษัท ฯ ตรวจสอบพบว่ามีการกระทำใดๆ ที่เข้าข่ายทุจริตหรือผิดวัตถุประสงค์ของกิจกรรม 
						<br /><span class="d-inline-block" style="width: 20px;">5.</span> ผู้จัดกิจกรรมขอสงวนสิทธิ์ในการเปลี่ยนแปลงการแสดงความเห็นทายผลก่อนแมทช์เริ่มแข่งขันตามเวลาที่ประกาศอย่างเป็นทางการ 1 ชั่วโมง และจะไม่รับผิดชอบต่อการแสดงความเห็นทายผลที่ไม่ถูกต้องของผู้ร่วมกิจกรรมไม่ว่ากรณีใดๆ
						<br /><span class="d-inline-block" style="width: 20px;">6.</span> ผู้ร่วมรายการสามารถเปลี่ยนคำตอบได้จนกว่าจะหมดเขตการแสดงความเห็นทายผลในแต่ละการแข่งขันภายใน 1 ชั่วโมงก่อนเวลาที่ประกาศการแข่งขันอย่างเป็นทางการของการแข่งขันนั้นๆ
						<br /><span class="d-inline-block" style="width: 20px;">7.</span> หากว่าการแข่งขันถูกยกเลิก ระงับหรือเลื่อนการแข่งขันออกไปนานกว่า 24 ชั่วโมง จากเวลาที่ประกาศการแข่งขันอย่างเป็นทางการ ผลจะถือว่าเป็นโมฆะ และการแสดงความเห็นทายผลในการแข่งขันนั้นจะถูกยกเลิก 
						<br /><span class="d-inline-block" style="width: 20px;">8.</span> รายการแข่งขันที่ต้องถูกยกเลิก ผลการแข่งขันจะถือเป็นโมฆะ และการแสดงความเห็นทายผลจะถูกยกเลิก ยกเว้นระบุไว้เป็นอย่างอื่น การตัดสินใจและความหมายของการยกเลิกสามารถทำได้โดยขึ้นอยู่กับดุลยพินิจในการตัดสินของคณะกรรมการดำเนินรายการในการตัดสิน
						<br /><span class="d-inline-block" style="width: 20px;">9.</span> บริษัทฯ ไม่มีความรับผิดชอบต่อสถานการณ์ใดๆ สำหรับข้อขัดแย้ง ความเสียหายหรือความสูญเสียที่เกิดจากเหตการณ์ดังต่อไปนี้
						<br /><span class="pl-20">&nbsp;&nbsp;- การหยุดชะงักของบริการที่ให้แก่เว็บไซต์(s) เซิร์ฟเวอร์(s) หรือเครือข่ายของบริษัทฯ
						<br /><span class="pl-20">&nbsp;&nbsp;- การสูญหายหรือความเสียหายของข้อมูลบนเซิร์ฟเวอร์(s) ของบริษัทฯ
						<br /><span class="pl-20">&nbsp;&nbsp;- การถูกแฮกเกอร์โจมตีเว็บไซต์ เซิร์ฟเวอร์หรือเครือข่ายของบริษัทฯ
						<br /><span class="pl-20">&nbsp;&nbsp;- การบริการอินเทอร์เน็ตที่ช้าหรือผิดปกติขณะเข้าเว็บไซต์ของบริษัทฯ
						<br /><span class="d-inline-block" style="width: 20px;">10.</span> หากผู้จัดกิจกรรมตรวจพบการพยายามแฮก หรือโจมตีระบบเครือข่าย ผู้จัดกิจกรรมขอสงวนสิทธิ์ในการยกเลิกผู้ร่วมกิจกรรมคนนั้นทันที
						<br /><span class="d-inline-block" style="width: 20px;">11.</span> กรณีหากมีการตัดสิน หรือหากมีข้อพิพาทใดๆ ให้คำตัดสินของคณะกรรมการถือเป็นเด็ดขาดและสิ้นสุด
						<br /><span class="d-inline-block" style="width: 20px;">12.</span> กติกาการตัดสินบริษัทฯ จะนำชิ้นส่วนของผู้ร่วมรายการทั้งหมดมาใส่ภาชนะที่มองเห็นชิ้นส่วนภายในได้ชัดเจนแล้วใช้วิธีคลุกเคล้าชิ้นส่วนทั้งหมดให้ทั่วกันแล้วโยนขึ้นบนอากาศ เชิญแขกผู้มีเกียรติ ทรงคุณวุฒิที่น่าเชื่อถือ จับชิ้นส่วนต่อหน้าคณะกรรมการและสักขีพยานเพื่อให้ได้รับรางวัลตามที่กำหนดไว้ พร้อมทั้งอ่านรายชื่อผู้โชคดีทันทีเพื่อให้ทุกๆ ท่านที่มาร่วมงานทราบโดยทั่วกัน
						<br /><span class="d-inline-block" style="width: 20px;">13.</span> ผู้โชคดีที่ได้รับรางวัล ทั้งที่มีภูมิลำเนาในกรุงเทพมหานครและต่างจังหวัดต้องนำหลักฐาน บัตรประจำตัวประชาชนระบุชื่อตรงตามที่กรอกไว้ พร้อมสำเนา 1 ชุด มาเป็นหลักฐานในการของรับรางวัลด้วยตนเองที่บริษัทฯ ในวันและเวลาทำการภายใน 30 วันนับแต่วันที่ประกาศผลรางวัล หากเลยกำหนดถือว่าสละสิทธิ์ และบริษัทจะมอบของรางวัลดังกล่าวแก่ผู้โชคดีสำรองที่มีรายชื่อลำดับถัดไป หากผู้โชคดีสำรองไม่ยืนยันตนเพื่อรับรางวัลภายในเวลาที่กำหนดถือว่าสละสิทธิ แล้วบริษัทฯ จะมอบของรางวัลดังกล่าวให้แก่องค์กรสาธารณกุศลหรือหน่วยงานราชการเพื่อประโยชน์ของราชการต่อไป
						<br /><span class="d-inline-block" style="width: 20px;">14.</span> ผู้โชคดีมีสิทธิ์ได้รับรางวัลเพียง 1 รางวัลตลอดรายการ หากพบว่าผู้โชคดีได้รับมากกว่า 1 รางวัล คณะกรรมการขอตัดสิทธิ์เหลือเพียง 1 รางวัลที่มีมูลค่าสูงสุด
						<br /><span class="d-inline-block" style="width: 20px;">15.</span> ผู้โชคดีที่ได้รับรางวัลมูลค่า 1,000 บาท ขึ้นไป จะต้องหักภาษี ณ ที่จ่าย 5 % ของมูลค่ารางวัลตามคำสั่งกรมสรรพากร ที่ ทป. 4/2528 ลงวันที่ 26 กันยายน 2528 ประกอบคำสั่งกรมสรรพากร ที่ ท.ป. 104/2544 ลงวันที่ 15 กันยายน 2544
						<br /><span class="d-inline-block" style="width: 20px;">16.</span> ในการจับชิ้นส่วนหากปรากฏชื่อผู้โชคดีแล้วจะต้องรับรางวัลตามที่กำหนดไว้ รางวัลที่ได้รับไม่สามารถโอนให้ผู้อื่นได้ และไม่สามารถเปลี่ยนเป็นเงินสดหรือของรางวัลอื่นได้ รวมทั้งไม่มีการจ่ายเงินเป็นส่วนประกอบแต่อย่างใด
						<br /><span class="d-inline-block" style="width: 20px;">17.</span> ประกาศรายชื่อผู้โชคดีทางเว็บไซต์ www.matchoftheweeks.com
						<br /><span class="d-inline-block" style="width: 20px;">18.</span> บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงรายละเอียดหรือเงื่อนไขโดยไม่ต้องแจ้งให้ทราบล่วงหน้า
						<br /><span class="d-inline-block" style="width: 20px;">19.</span> บริษัทฯ ยินดีจัดเตรียมเอกสาร รับผิดชอบค่าใช้จ่ายเรื่องการจัดทำ และดำเนินการขอวีซ่าให้แก่ผู้โชคดี
						<br /><span class="d-inline-block" style="width: 20px;">20.</span> พนักงาน บริษัท วู้ดดี้ เวิลด์ จำกัด คณะกรรมการดำเนินรายการ บริษัทที่เกี่ยวข้องกับการจัดกิจกรรมนี้ รวมทั้งบุคคลในครอบครัวไม่มีสิทธิ์เข้าร่วมรายการนี้
						<br /><span class="d-inline-block" style="width: 20px;">21.</span> ผู้ร่วมรายการต้องศึกษากฎ กติกาและเงื่อนไขการเข้าร่วมกิจกรรม การเข้าร่วมกิจกรรมถือเป็นการยอมรับกฎ กติกาและเงื่อนไขทุกประการ กฎเหล่านี้มีไว้เพื่อนิยามข้อกำหนดและเงื่อนไขที่ใช้กับการแสดงความเห็นทายผลทั้งหมดที่รับ โดยไม่มีการวางเดิมพันใดๆ โดยผู้ร่วมรายการต้องรับผิดชอบเพื่อจะทำให้ตัวผู้ร่วมรายการเองตระหนักถึงกฎเหล่านี้และข้อกำหนดได้รับการยอมรับการแสดงความเห็นทายผลของผู้ร่วมรายการ
						<br /><span class="d-inline-block" style="width: 20px;">22.</span> ผู้จัดกิจกรรมมีสิทธิ์ในการระงับ หรือยกเลิกการให้สิทธิ์หรือรางวัลใดๆในการส่งเสริมการขายนี้แก่บุคคลที่กระทำผิดใดๆ โดยทุจริต หรือผิดกฎหมาย หรือไม่ดำเนินการตามที่ระบุไว้ในเงื่อนไขในรายการส่งเสริมการขายนี้ 
						<br /><span class="d-inline-block" style="width: 20px;">23.</span> ผู้จัดกิจกรรมมีสิทธิในการแก้ไข เปลี่ยนแปลง หรือยกเลิกข้อกำหนดหรือเงื่อนไขใดๆ ในรายการส่งเสริมการขายนี้ได้ตามที่เห็นสมควร โดยจะแจ้งให้ทราบล่วงหน้าผ่านช่องทางที่ผู้จัดกิจกรรมพิจารณาเห็นสมควร
						<br /><span class="d-inline-block" style="width: 20px;">24.</span> ผู้โชคดีที่ได้รับรางวัลรับทราบและตกลงให้ผู้จัดกิจกรรม นำภาพผู้โชคดีที่ได้รับรางวัลเผยแพร่เพื่อประชาสัมพันธ์ในโอกาสต่างๆ ได้โดยไม่โต้แย้ง หรือเรียกร้องสิทธิ์ใดๆ ทั้งสิ้น
						<br /><span class="d-inline-block" style="width: 20px;">25.</span> ตรวจสอบเงื่อนไขและรายละเอียดเพิ่มเติมได้ที่ www.matchoftheweeks.com
						<br /><span class="d-inline-block" style="width: 20px;">26.</span> - ผู้โชคดีจากการจับรางวัลครั้งที่ 1 เดินทางภายในเดือนพฤศจิกายน 2561
						<br /><span class="pl-20">&nbsp;&nbsp;- ผู้โชคดีจากการจับรางวัลครั้งที่ 2 เดินทางภายในเดือนธันวาคม 2561
						<br /><span class="pl-20">&nbsp;&nbsp;- ผู้โชคดีจากการจับรางวัลครั้งที่ 3 เดินทางภายในเดือนมกราคม 2562
						<br /><span class="pl-20">&nbsp;&nbsp;- ผู้โชคดีจากการจับรางวัลครั้งที่ 4 เดินทางภายในเดือนกุมภาพันธ์ 2562
						<br /><span class="pl-20">&nbsp;&nbsp;- ผู้โชคดีจากการจับรางวัลครั้งที่ 5 เดินทางภายในเดือนมีนาคม 2562
						<br /><span class="pl-20">&nbsp;&nbsp;- ผู้โชคดีจากการจับรางวัลครั้งที่ 6 เดินทางภายในเดือนเมษายน 2562
						<br /><span class="pl-20">&nbsp;&nbsp;- ผู้โชคดีจากการจับรางวัลครั้งที่ 7 เดินทางภายในเดือนพฤษภาคม 2562
						<br /><span class="pl-20">&nbsp;&nbsp;- ผู้โชคดีจากการจับรางวัลครั้งที่ 8 เดินทางภายในเดือนสิงหาคม 2562
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
