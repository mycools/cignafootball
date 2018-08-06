@include('frontend.includes.header')
<link rel="stylesheet" type="text/css" href="{{ url('/vendors/fullpage-js/dist/jquery.fullpage.css') }}" />

		@yield('content')


			<footer>
				Sponsored by <img src="{{ url('images/logo/logo_cigna_footer.png') }}" />
			</footer>

		</div>

		<style type="text/css">
			#header, footer {
				position: fixed;
				top: 0;
				width: 100%;
			}
			footer {
				top: auto;
				bottom: 0;
			}
		</style>
		
		<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

		<script src="{{ url('/vendors/fullpage-js/vendors/jquery.easings.min.js') }}"></script>
		<script src="{{ url('/vendors/fullpage-js/vendors/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ url('/vendors/fullpage-js/dist/jquery.fullpage.min.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function() {

				// Fullpage 
				$('.fullpage-wrapper').fullpage({
					licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
					navigation: false,
					responsiveWidth: 768,
					scrollingSpeed: 1000,
					scrollOverflow: true
				});
				
			});
		</script>
		
	</body>
</html>

