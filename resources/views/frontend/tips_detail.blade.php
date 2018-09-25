@extends('layouts.master')

@section('og_title', "Match of The Weeks")
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
						@php
                                    if($detail->image_thumb){
                                        $img = Storage::url($detail->image_thumb);
                                    }else{
                                        $img = '';
                                    }
                                        
                                    @endphp
							<img class="w-100" src="{{ $img }}" />
						</div>
						<div class="col-12">
							<div class="detail pb-30 pl-30 pr-30 pt-30 pb-sm-15 pl-sm-15 pr-sm-15 pt-sm-15">
								<div class="title text-large mgb-5">{{ $detail->title }}</div>
								
								<div class="excerpt color-gray mb-15" style="height: auto;">
								{{ Carbon\Carbon::parse($detail->created_at)->format('M d, Y') }}
								</div>
								<div class="excerpt mb-45">
									{{ $detail->detail}}
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
							@foreach ($lastest as $ls)
							<div class="col-12 p-0">
								<div class="tips-item row pin">
									<div class="col-12">
									@php
                                    if($ls->image_thumb){
                                        $img = Storage::url($ls->image_thumb);
                                    }else{
                                        $img = '';
                                    }
                                        
                                    @endphp
										<img class="w-100" src="{{ $img }}" />
									</div>
									<div class="col-12">
										<a class="detail pl-0 pr-0 pt-10 d-block" href="{{ url('/tips/detail/'.$ls->id) }}">
											<div class="title">{{ $ls->title}}</div>
											<div class="excerpt color-gray mgb-5" style="height: auto;">
											{{ Carbon\Carbon::parse($ls->created_at)->format('M d, Y') }}
											</div>
										</a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

</div>
@endsection
