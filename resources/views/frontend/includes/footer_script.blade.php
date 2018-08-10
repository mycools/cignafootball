<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

<script>
	function copyToCliboard() {
	  var copyText = document.getElementById("myInputCopy");
	  copyText.select();
	  document.execCommand("copy");
	  alert("\tก็อปปี้ URL ชวนเพื่อนแล้ว คุณสามารถ paste url ในการชวนเพื่อนในช่องทางต่างๆ เช่น Line, Facebook หรืออื่น ๆ \n\n\t" + copyText.value);
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
