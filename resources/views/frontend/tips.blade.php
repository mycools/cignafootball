@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page bg_rules non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title mb-30 mb-sm-15 mb-xs-0">HEALTH TIPS</h1>

			<div class="row justify-content-center mb-45 mb-sm-15">
				<div class="col-12 m-auto">
					
					<div class="tips-list">
						<div class="row justify-content-center align-items-center">
							<div class="col-12 mb-30">
								<div class="tips-item row pin mr-sm-0 ml-sm-0">
									<div class="col-12 col-md-8 pr-0 pl-sm-0">
										<img class="w-100" src="{{ url('images/default_health_tips.jpg') }}" />
									</div>
									<div class="col-12 col-md-4 d-flex pl-0 pr-sm-0">
										<div class="detail">
											<div class="title">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
											<div class="excerpt">
												Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
											</div>
											<a class="btn btn-lightblue d-block font-med" href="{{ url('/tips/detail') }}">อ่านเพิ่มเติม</a>
										</div>
									</div>
								</div>
							</div>
							@for ($i = 1; $i < 7; $i++)
							<div class="col-12 col-md-4 mb-30">
								<div class="tips-item row pin">
									<div class="col-12">
										<img class="w-100" src="{{ url('images/default_health_tips.jpg') }}" />
									</div>
									<div class="col-12">
										<div class="detail">
											<div class="title">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
											<div class="excerpt">
												Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
											</div>
											<a class="btn btn-lightblue d-block font-med" href="{{ url('/tips/detail') }}">อ่านเพิ่มเติม</a>
										</div>
									</div>
								</div>
							</div>
							@endfor
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>
@endsection
