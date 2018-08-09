@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page bg_profile non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<div class="row justify-content-center mb-45 mb-sm-15">
				<div class="col-12 col-md-10 m-auto">
					<div class="box-wrapper pl-45 pr-45 p-0">

						<div class="header-row-1 bg-green p-15 pdt-5 pdb-5 text-center">
							<h1 class="text-large font-med mb-0">FULL HISTORY</h1>
						</div>
						<div class="header-row-2 bg-midgreen p-15 pt-0 pb-0 text-center">
							<h1 class="mb-0 d-inline font-light">ทายไปแล้ว : </h1><h1 class="text-extra-large font-bold mb-0 d-inline">30</h1>
						</div>
						<div class="header-row-3 bg-darkgreen p-15 pt-0 pb-0 text-center">
							<div class="row justify-content-center align-items-center">
								<div class="col-6">
									<h1 class="mb-0 d-inline">Match ทั้งหมด</h1>
								</div>
								<div class="col-3 pt-10 pdb-5" style="line-height: 1.1;">
									<i class="fa fa-check-circle mgr-5" aria-hidden="true"></i> ถูก
									<div class="text-extra-large" style="line-height: 0.65;">20</div>
								</div>
								<div class="col-3 pt-10 pdb-5" style="line-height: 1.1;">
									<i class="fa fa-times-circle mgr-5" aria-hidden="true"></i> ผิด
									<div class="text-extra-large" style="line-height: 0.65;">10</div>
								</div>
							</div>
						</div>

						@for ($i = 1; $i < 5; $i++)
						<div class="row text-center align-items-center bg-gray ml-0 mr-0 pt-0 pb-0 color-white">
							<div class="col-6 p">
								Week 20 Aug - 26 Aug
							</div>
							<div class="col-3 pdt-5 text-large color-green">
								<i class="fa fa-check" aria-hidden="true"></i>
							</div>
							<div class="col-3 pdt-5 text-large color-red">
								<i class="fa fa-times" aria-hidden="true"></i>
							</div>
						</div>
						<div class="row text-center align-items-center bg-darkgray ml-0 mr-0 pt-0 pb-0 color-white">
							<div class="col-6 p">
								Week 20 Aug - 26 Aug
							</div>
							<div class="col-3 pdt-5 text-large color-green">
								<i class="fa fa-check" aria-hidden="true"></i>
							</div>
							<div class="col-3 pdt-5 text-large color-red">
								<i class="fa fa-times" aria-hidden="true"></i>
							</div>
						</div>
						@endfor
						

					</div>
				</div>
			</div>

		</div>
	</div>

</div>
@endsection
