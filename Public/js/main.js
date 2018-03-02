'Use strict';

/*$(".btn").addClass("btn-active");

$(".btn").removeClass("btn-active");

if ( $(".btn").hasClass("btn-active") )*/

$('.btn').click(function() { 
  $('.btn').removeClass('btn-active'); 
  $(this).addClass('btn-active'); 
});