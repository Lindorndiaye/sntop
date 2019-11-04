 $(document).ready(function(){

    var position = $('#fixe').offset().top;
    $(window).scroll(function (){
    if ($(window).scrollTop() > position){
      // fixed
      $('#fixe').addClass("navbar-fixed-top").removeClass("navbar-static-top");
    } else{
      // relative
      $('#fixe').removeClass("navbar-fixed-top");
      }
    }); 

    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');                     
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');              
            });

     function Redirect( adress ) {
        window.location= adress ;
      }
 
  });
  
  
