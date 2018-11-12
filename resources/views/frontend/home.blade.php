@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrappage-page bg_home non-fullpage home-page">
<div id="myModal" class="modal fade">
	<div class="modal-dialog">

			
					<img src="{{ url('images/starbucks.png') }}" class="img-fluid" style="max-height:800px;"/>
			
	</div>
</div>
	<div class="home-slider">
		<div class="item slider-video">
			<a href="{{ url('match') }}">
  				<img class="d-none d-sm-block" style='padding-bottom: 140px' src="{{ url('images/home/banner.jpg') }}" />
  				<img class="d-block d-sm-none" src="{{ url('images/home/banner_mobile.jpg') }}" />
	  		</a>
		</div>
	</div>
	<div class="section fp-auto-height active">
		<div class="container">

			

			<div class="row justify-content-center">
				@foreach($rs as $health)
				<div class="col-12 col-sm-6 mb-30 mb-sm-15">
				<div class="tips-item row pin mr-sm-0 ml-sm-0">
									<div class="col-12 col-md-9 pr-0 pl-sm-0">
									@php
                                    if($health->image_thumb){
                                        $img = Storage::url($health->image_thumb);
                                    }else{
                                        $img = '';
                                    }
                                        
                                    @endphp
										<img class="w-100" src="{{ $img }}" />
									</div>
									<div class="col-12 col-md-3 d-flex pl-0 pr-sm-0">
										<div class="detail">
											<div class="title">{{ $health->title }}</div>
											<div class="excerpt">
												{{ $health->description }}
											</div>
											<a class="btn btn-lightblue d-block font-med" href="{{ url('/tips/detail/'.$health->id) }}">อ่านเพิ่มเติม</a>
										</div>
									</div>
								</div>
				</div>
				@endforeach
				
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-md-6 text-center mt-3">
					<div class="iframe-wrapper">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLLuDOBVmNPvqn5EC_TfzYTpfzpl7DoVrJ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						
					</div>
				</div>

			</div>

			@include('frontend.components.home-share')

		</div>
	</div>

	<div class="home-ranking">
		<div class="btn btn-blue open-list">
			<img src="{{ url('images/icon/icon_trophy.png') }}" />
		</div>
		<div class="ranking-head">
			USER TOP 10 RANKING
		</div>
		<div class="ranking-list">
			@if (isset($result))
                @php
                  $i=1;
                @endphp
            	@foreach ($result as $row)
            	<div class="row-item">
					<div class="number">{{ $i }}</div>
					{{ ($row->getUser ? $row->getUser->username : '' ) }} 
				</div>
				@php
					$i++;
				@endphp
				@endforeach
			@endif
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
@stop
