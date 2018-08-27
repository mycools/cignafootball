		<footer>
			<div class="row justify-content-between">
				<div class="col-12 col-md-auto mb-3 mb-md-0 text-center text-md-left">
					Copyright © 2018 Match Of The Weeks
				</div>
				<div class="col-12 col-md-auto mb-3 mb-md-0 text-center text-md-right">
					Power by 
					<img style="height: 30px;" src="{{ url('images/logo/woody_world.png') }}" />
				</div>
		</footer>

		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		@include('frontend.includes.footer_script')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<script type="text/javascript">
		let value = 0;
		$(document).ready(function() {
			$("#voteHome").click(function() {
				$("#voteHome").css('opacity', 1);
				$("#voteDraw").css('opacity', 0.65);
				$("#voteAway").css('opacity', 0.65);
				value = 1;
			});
			$("#voteDraw").click(function() {
				$("#voteHome").css('opacity', 0.65);
				$("#voteDraw").css('opacity', 1);
				$("#voteAway").css('opacity', 0.65);
				value = 2;
			});
			$("#voteAway").click(function() {
				$("#voteHome").css('opacity', 0.65);
				$("#voteDraw").css('opacity', 0.65);
				$("#voteAway").css('opacity', 1);
				value = 3;
			});

			$("#onVote").click(function() {
				if (value === 1) {
					$("#voteHome").prop('disabled', false);
					$("#voteDraw").prop('disabled', true);
					$("#voteAway").prop('disabled', true);
					value = 4;
				} else if (value === 2) {
					$("#voteHome").prop('disabled', true);
					$("#voteDraw").prop('disabled', false);
					$("#voteAway").prop('disabled', true);
					value = 4;
				} else if (value === 3) {
					$("#voteHome").prop('disabled', true);
					$("#voteDraw").prop('disabled', true);
					$("#voteAway").prop('disabled', false);
					value = 4;
				} else {

				}
				// $("#voteDraw").css('opacity', 0.65);
				// $("#voteAway").css('opacity', 1);
			});
		});
		</script>
	</body>
</html>
