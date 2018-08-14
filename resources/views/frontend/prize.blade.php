@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page bg_prize non-fullpage pt-45 pb-0">

	<div class="section fp-auto-height active">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-10 col-lg-7 col-xl-6 m-auto text-center pt-sm-30 pb-sm-45 pb-60">

					<div class="prize-wrapper">
						<div class="bg">
							<img class=" w-100" src="{{ url('images/bg_prize_tour_desktop.png') }}" />
						</div>
						<div class="content">
							<h1><span class="color-yellow">“Exclusive Trip</span> 6 วัน 3 คืน”</h1>
							<div class="text-italic">
								<span class="color-yellow">ดูบอลพรีเมียร์ลีก</span>ถึงประเทศอังกฤษ <br />
								พร้อมทริปเที่ยว กิน ฟินทั้งทริป!
							</div>
							<div class="text-italic mgt-5">
								<span class="color-yellow">แจกทุกเดือน</span> เดือนละ 5 รางวัล รางวัลละ 2 ที่นั่ง<br />
								มูลค่ารางวัลละ <span class="color-yellow">200,000 บาท</span>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>
@endsection
