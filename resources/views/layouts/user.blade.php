@include('frontend.includes.header')
<link rel="stylesheet" type="text/css" href="{{ url('/vendors/fullpage-js/dist/jquery.fullpage.css') }}" />


		@yield('content')


			<footer>
				Sponsored by <img src="{{ url('images/logo/logo_cigna_footer.png') }}" />
			</footer>

		</div>

		<style type="text/css">
			#header,
			footer {
				position: fixed;
				top: 0;
				width: 100%;
			}
			footer {
				top: auto;
				bottom: 0;
			}
			.register-page.non-fullpage {
				padding-top: 100px;
			}
			.register-page.non-fullpage + .modal + footer {
				position: relative;
			}
			@media (max-width: 767.98px) {
				#header, footer {
					position: relative;
				}
				.fullpage-wrapper {
				    padding: 30px 0;
				}
				.register-page.non-fullpage {
					padding-top: 60px;
					padding-bottom: 60px;
				}
			}
			@media (max-width: 575.98px) {
				.register-page.non-fullpage {
					padding-top: 30px;
					padding-bottom: 30px;
				}
			}
		</style>
		<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

		<script src="{{ url('/vendors/fullpage-js/vendors/jquery.easings.min.js') }}"></script>
		<script src="{{ url('/vendors/fullpage-js/vendors/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ url('/vendors/fullpage-js/dist/jquery.fullpage.min.js') }}"></script>

		<script>
			function copyToCliboardProfile() {
			  var copyUrl = document.getElementById("myInvite");
			  copyUrl.select();
			  document.execCommand("copy");
			  alert("Copied the text: " + copyUrl.value);
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function() {

				// Fullpage 
				$('.fullpage-wrapper').fullpage({
					licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
					navigation: false,
					responsiveWidth: 768,
					scrollingSpeed: 1000,
					scrollOverflow: true,
					// paddingBottom: 80
				});

				$('.datepicker').datepicker({
					autoclose: 'true',
				});
				
			});
		</script>
		
	</body>
</html>

