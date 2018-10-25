@extends('layouts.master')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="wrappage-page bg_home non-fullpage home-page">
<div id="myModal" class="modal fade">
	<div class="modal-dialog">

			
					<img src="{{ url('images/motw.png') }}" class="img-fluid" style="max-height:800px;"/>
			
	</div>
</div>
	<div class="home-slider">
		<div class="item slider-video">
			<a href="{{ url('match') }}">
  				<img class="d-none d-sm-block" src="{{ url('images/home/banner.jpg') }}" />
  				<img class="d-block d-sm-none" src="{{ url('images/home/banner_mobile.jpg') }}" />
	  		</a>
		</div>
	</div>
	<div class="section fp-auto-height active">
		<div class="container">

			<div class="row justify-content-center mb-30 mb-sm-15">
				<div class="col-12">
					<a class="btn-img" href="{{ url('match') }}">
						<img class="d-none d-sm-block w-100" src="{{ url('images/home/predict_banner_desktop.jpg') }}" />
						<img class="d-block d-sm-none w-100" src="{{ url('images/home/predict_banner_mobile.jpg') }}" />
					</a>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-12 col-sm-6 mb-30 mb-sm-15">
					<a class="btn-img" href="{{ url('ranking') }}">
						<img class="w-100" src="{{ url('images/home/user_ranking.jpg') }}" />
					</a>
				</div>
				<div class="col-12 col-sm-6 mb-30 mb-sm-15">
					<a class="btn-img" href="{{ url('rules') }}">
						<img class="w-100" src="{{ url('images/home/rules_fun.jpg') }}" />
					</a>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 col-md-6 text-center mt-3">
					<div class="iframe-wrapper">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/EN3QXN6Qfto" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
