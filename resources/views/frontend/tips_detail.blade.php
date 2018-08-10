@extends('layouts.master')

@section('og_title', "Cigna : Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')
<div class="wrapper-page bg_rules non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<div class="row justify-content-center mb-45 mb-sm-15">
				
				<div class="col-12 col-md-9">

					<div class="tips-item row content">
						<div class="col-12">
							<img class="w-100" src="{{ url('images/default_health_tips.jpg') }}" />
						</div>
						<div class="col-12">
							<div class="detail pb-30 pl-30 pr-30 pt-30 pb-sm-15 pl-sm-15 pr-sm-15 pt-sm-15">
								<div class="title text-large mgb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
								<div class="excerpt color-gray mb-15" style="height: auto;">
									Jul 31, 2018
								</div>
								<div class="excerpt mb-45">
									Where does it come from?<br />
									Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
									<br /><br />
									The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
								</div>
								<a class="btn btn-lightblue font-med pr-25" href="{{ url('/tips') }}"><i class="fa fa-angle-left mgr-5"></i> BACK</a>
							</div>
						</div>
					</div>

				</div>
				<div class="col-12 col-md-3">
					<div class="tips-list">
						<div class="tips-head bg-lightblue p-15 pdt-5 pdb-5">
							<h2 class="color-white font-bold m-0">LASTED POST</h2>
						</div>
						<div class="row justify-content-center align-items-center p-15 pt-20 bg-white ml-0 mr-0">
							@for ($i = 1; $i < 4; $i++)
							<div class="col-12 p-0">
								<div class="tips-item row pin">
									<div class="col-12">
										<img class="w-100" src="{{ url('images/default_health_tips.jpg') }}" />
									</div>
									<div class="col-12">
										<a class="detail pl-0 pr-0 pt-10 d-block" href="{{ url('/tips/detail') }}">
											<div class="title">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
											<div class="excerpt color-gray mgb-5" style="height: auto;">
												Jul 31, 2018
											</div>
										</a>
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
