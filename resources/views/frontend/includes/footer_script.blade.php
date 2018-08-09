<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

<script>
	function copyToCliboard() {
	  var copyText = document.getElementById("myInputCopy");
	  copyText.select();
	  document.execCommand("copy");
	  alert("Copied the text: " + copyText.value);
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
