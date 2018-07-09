(function($){

  var ll_scroll_position = 0;
  $(document).scroll(function(){

    ll_scroll_position = $(this).scrollTop();



    if( ll_scroll_position > 100 ){

      $( "body" ).addClass( "is-scrolled" );

    } else {

      $( "body" ).removeClass( "is-scrolled" );
    }

  });


} (jQuery) );
