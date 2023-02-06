$(document).ready(function() {
 
  $('.method').on('click', function() {
    $('.method').removeClass('blue-border');
    $(this).addClass('blue-border');
  });
 
})
var $cardInput = $('.input-fields input');
 
$('.next-btn').on('click', function(e) {
 
  $cardInput.removeClass('warning');
 
  $cardInput.each(function() {    
     var $this = $(this);
     if (!$this.val()) {
       $this.addClass('warning');
     }
  })
});