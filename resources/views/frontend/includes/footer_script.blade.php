<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

<script>
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
	$.ajaxSetup({
	    headers: {
	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
</script>

@yield('scripts')
