@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page non-fullpage pt-45 pb-0">
	<div class="bg_wrapper bg_prize"></div>
	<div class="section fp-auto-height active">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-10 col-lg-6 m-auto text-center pt-30 pb-1 pb-lg-5">

					<div class="prize-wrapper">
						<div class="bg">
							<img class=" w-100" src="{{ url('images/prize/prize_tour1-1.png') }}" />
						</div>
						<div class="content">
							<h1><span class="color-yellow">“Exclusive Trip</span> 6 วัน 3 คืน”</h1>
							<div class="text-italic">
								<span class="color-yellow">ดูบอลพรีเมียร์ลีก</span>ถึงประเทศอังกฤษ <br />
								พร้อมทริปเที่ยว กิน ฟินทั้งทริป!
							</div>
							<div class="text-italic mgt-5">
								<span class="color-yellow">แจกทุกเดือน</span> เดือนละ 5 รางวัล รางวัลละ 2 ที่นั่ง<br />
								มูลค่ารางวัลละ <span class="color-yellow">200,000 บาท</span> รวม 40 รางวัล
							</div>
						</div>
					</div>

				</div>
				<div class="col-12 col-sm-12 col-md-10 col-lg-6 m-auto text-center pt-30 pb-5">

					<div class="prize-wrapper">
						<div class="bg">
							<img class=" w-100" src="{{ url('images/prize/prize_gold1-1.png') }}" />
						</div>
						<div class="content text-italic">
							<h1><span class="text-small">และลุ้นรางวัลใหญ่ </span><span class="text-small color-yellow">ทองคำมูลค่า</span></h1>
							<h1 class="mb-0">
								<span class="color-yellow text-large font-bold">5 ล้านบาท</span><br />
								1 รางวัล<br />
								<span class="text-small">“ทายมากมีสิทธิ์มาก”</span>
							</h1>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>
@endsection
