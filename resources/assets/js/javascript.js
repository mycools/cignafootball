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

	$('.home-ranking .open-list').on('click', function (e) {
		$(this).parent('.home-ranking').toggleClass('active');
	});


	// $(window).scroll(function() {    
	//     var scroll = $(window).scrollTop();
	//     if (scroll >= 300) {
	//         $('.home-ranking').removeClass('active');
	//     } else {
	//     	$('.home-ranking').addClass('active');
	//     }
	// });

	$('#sharefb').on('click',share_facebook);
	$('#sharefbmb').on('click',share_facebook);


});
function share_facebook() {
	var base_url = window.location.href; 

	window.open('http://www.facebook.com/sharer.php?u=' + base_url, '_fb','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=600');
}


