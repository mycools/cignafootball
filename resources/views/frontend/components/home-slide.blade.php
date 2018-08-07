<!-- <div class="home-slider">
@if(isset($result_banner_video))
		@foreach($result_banner_video as $video)

		@php
			$url 	= ( $video['video_url'] ? $video['video_url'] : 'javascript:;' );
			// $title 	= $video['video_title'];
			// $desc 	= $video['video_sdec'];
			// $video 	= $video['video_video'];
		@endphp
			<div class="item slider-video">
				<a href="{{ $url }}">
					<div class="video-wrapper">
		  				{{-- @php
						    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

						    if (preg_match($longUrlRegex, $video, $matches)) {
						        $youtube_id = $matches[count($matches) - 1];
						    }
		  				@endphp --}}
		  				<video class="slide-video slide-media">
							<source src="{{ $video['banner_video'] }}" type="video/mp4">
						</video>
		  			</div>
		  		</a>
			</div>
		@endforeach
@endif
</div> -->
@if(!$detect->isMobile())
	<div class="home-slider home-slider-dt">
	@if(isset($result_banner))
		@foreach($result_banner as $banner)

		@php
			$url 	= ( $banner['banner_url'] ? $banner['banner_url'] : 'javascript:;' );
			$title 	= $banner['banner_title'];
			$desc 	= $banner['banner_sdec'];
			$image 	= ( $banner['banner_image'] ? $banner['banner_image'] : '' );
			$imageMb 	= ( $banner['banner_image_mb'] ? $banner['banner_image_mb'] : '' );
		@endphp

		<div class="item slider-video">
			@if(!empty($banner['banner_video']))
				<a href="{{ $url }}">
					<div class="video-wrapper">
		  				<video class="slide-video slide-media" muted autoplay>
							<source src="{{ $banner['banner_video'] }}" type="video/mp4">
						</video>
		  			</div>
		  		</a>
			@endif
			@if(empty($banner['banner_video']))
			<a href="{{ $url }}">
  				<img class="d-none d-sm-block" src="{{ $image }}" />
  				<img class="d-block d-sm-none" src="{{ $imageMb }}" />
	  		</a>
	  		@endif
		</div>

		@endforeach
	@endif
	</div>

@else

	<div class="home-slider home-slider-mb">
	@if(isset($result_banner))
			@foreach($result_banner as $banner)

			@php
				$url 	= ( $banner['banner_url'] ? $banner['banner_url'] : 'javascript:;' );
				$title 	= $banner['banner_title'];
				$desc 	= $banner['banner_sdec'];
				$image 	= ( $banner['banner_image'] ? $banner['banner_image'] : '' );
				$imageMb 	= ( $banner['banner_image_mb'] ? $banner['banner_image_mb'] : '' );
			@endphp

				@if(empty($banner['banner_video']))
				<div class="item">
					<a href="{{ $url }}">
		  				<img class="d-none d-sm-block" src="{{ $image }}" />
		  				<img class="d-block d-sm-none" src="{{ $imageMb }}" />
			  		</a>
				</div>
				@endif

			@endforeach
	@endif
	</div>

@endif