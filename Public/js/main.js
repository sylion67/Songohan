'use strict';
/*$(".btn").addClass("btn-active");

$(".btn").removeClass("btn-active");

if ( $(".btn").hasClass("btn-active") )*/
$('.btn').click(function() { 
  $('.btn').removeClass('btn-active'); 
  $(this).addClass('btn-active'); 
});

$('.radiospot').click(function() {
	$('#js_action').val('reservation.create');
	$('.spotview').addClass('show');;
	$('.spotview').removeClass('hidden');
	$('.deliveryview').addClass('hidden');
	$('.deliveryview').removeClass('show');
	
	
});

$('.radiodel').click(function() {
	$('#js_action').val('order.create');
	$('.deliveryview').addClass('show');
	$('.deliveryview').removeClass('hidden');
	$('.spotview').addClass('hidden');
	$('.spotview').removeClass('show');
});
	

