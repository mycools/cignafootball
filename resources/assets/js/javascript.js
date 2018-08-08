$(document).ready(function() {

	var slideWrapper = $(".home-slider");
	slideWrapper.slick({
		dots: true,
		autoplay: true,
		autoplaySpeed: 7000,
		speed: 500,
		fade: true,
		infinite: false,
		responsive: [
			{
			  breakpoint: 767.98,
			  settings: {
			    adaptiveHeight: true
			  }
			}
		]
	});

 
});
