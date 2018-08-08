@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ทายผลบอลอังกฤษ ลุ้นรางวัลต่อที่ 1 ดูบอลที่อังกฤษทุกเดือน ต่อที่ 2 ลุ้นรับรางวัลมูลค่า 30 ล้าน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page bg_rules non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title mb-30 mb-sm-15 mb-xs-0">RULES</h1>

			<div class="row justify-content-center mb-45 mb-sm-15">
				<div class="col-12 col-md-10 m-auto">
					<div class="box-wrapper pl-45 pr-45 pl-md-30 pr-md-30 pl-xs-15 pr-xs-15">

						<h3 class="color-yellow">Lorem Ipsum</h3>
						<div class="p mb-15">
							Where does it come from?<br />
							Contrary to popular belief, layoutsrem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
						</div>
						@for ($i = 1; $i < 9; $i++)
						<div class="p mb-15">
							{{ $i }}. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
						</div>
						@endfor

					</div>
				</div>
			</div>

		</div>
	</div>

</div>
@endsection
