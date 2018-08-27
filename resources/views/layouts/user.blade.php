@include('frontend.includes.header')
<link rel="stylesheet" type="text/css" href="{{ url('/vendors/fullpage-js/dist/jquery.fullpage.css') }}" />


		@yield('content')


			<footer>
				<div class="row justify-content-between">
					<div class="col-12 col-md-auto mb-3 mb-md-0 text-center text-md-left">
						Copyright © 2018 Match Of The Weeks
					</div>
					<div class="col-12 col-md-auto mb-3 mb-md-0 text-center text-md-right">
						<img src="{{ url('images/logo/footer.jpg') }}" />
					</div>
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

		@yield('pagescript')

		<script>
			function copyToCliboardProfile() {
			  var copyUrl = document.getElementById("myInvite");
			  copyUrl.select();
			  document.execCommand("copy");
			  alert("\tก็อปปี้ URL ชวนเพื่อนแล้ว คุณสามารถ paste url ในการชวนเพื่อนในช่องทางต่างๆ เช่น Line, Facebook หรืออื่น ๆ \n\n\t" + copyUrl.value);
			}
			function copyToCliboard() {
			  var copyText = document.getElementById("myInviteUrl");
			  copyText.select();
			  document.execCommand("copy");
			  alert("\tก็อปปี้ URL ชวนเพื่อนแล้ว คุณสามารถ paste url ในการชวนเพื่อนในช่องทางต่างๆ เช่น Line, Facebook หรืออื่น ๆ \n\n\t" + copyText.value);
			}

			var copy = function(elementId) {
				var input = document.getElementById(elementId);
				var isiOSDevice = navigator.userAgent.match(/ipad|iphone/i);
				if (isiOSDevice) {
				  
					var editable = input.contentEditable;
					var readOnly = input.readOnly;

					input.contentEditable = true;
					input.readOnly = false;

					var range = document.createRange();
					range.selectNodeContents(input);

					var selection = window.getSelection();
					selection.removeAllRanges();
					selection.addRange(range);

					input.setSelectionRange(0, 999999);
					input.contentEditable = editable;
					input.readOnly = readOnly;


				} else {
				 	input.select();
					alert("\tก็อปปี้ URL ชวนเพื่อนแล้ว คุณสามารถ paste url ในการชวนเพื่อนในช่องทางต่างๆ เช่น Line, Facebook หรืออื่น ๆ \n\n\t" + input.value);
				}
				document.execCommand('copy');
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

