$(document).ready(function() {
  var input=$('.input');
  var pesan=$('.pesan');
  var login=$('.login');

input.blur(function() {
  if($(this).val() === ''){
    $(this.nextElementSibling).fadeIn('slow');
    $(this).css('border','1px red solid');
    
    

  }else {
    $(this.nextElementSibling).fadeOut('slow');
    $(this).css({
      'border':'1px green solid',
      'background' : 'white'
    })
    login.css({'display':'block'})
  }


})
});
