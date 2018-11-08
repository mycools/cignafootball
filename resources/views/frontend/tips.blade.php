@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrapper-page bg_rules non-fullpage">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title mb-30 mb-sm-15 mb-xs-0">สาระน่ารู้</h1>

			<div class="row justify-content-center mb-45 mb-sm-15">
				<div class="col-12 m-auto">
					
					<div class="tips-list">
						<div class="row justify-content-left align-items-left">
							<div class="col-12 mb-30">
								<div class="tips-item row pin mr-sm-0 ml-sm-0">
									<div class="col-12 col-md-8 pr-0 pl-sm-0">
									@php
                                    if($hilight->image_thumb){
                                        $img = Storage::url($hilight->image_thumb);
                                    }else{
                                        $img = '';
                                    }
                                        
                                    @endphp
										<img class="w-100" src="{{ $img }}" />
									</div>
									<div class="col-12 col-md-4 d-flex pl-0 pr-sm-0">
										<div class="detail">
											<div class="title">{{ $hilight->title }}</div>
											<div class="excerpt">
												{{ $hilight->description }}
											</div>
											<a class="btn btn-lightblue d-block font-med" href="{{ url('/tips/detail/'.$hilight->id) }}">อ่านเพิ่มเติม</a>
										</div>
									</div>
								</div>
							</div>
							@foreach ($result as $ls)
							<div class="col-12 col-md-4 mb-30">
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
										<div class="detail">
											<div class="title">{{ $ls->title }}</div>
											<div class="excerpt">
												{{ $ls->description }}
											</div>
											<a class="btn btn-lightblue d-block font-med" href="{{ url('/tips/detail/'. $ls->id) }}">อ่านเพิ่มเติม</a>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							
						</div>
						<div class="row justify-content-center align-items-center">
						{{ $result->links() }}
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

</div>
@endsection
