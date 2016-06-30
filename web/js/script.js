     var lvideo = $(".left").find( "video" );
     var rvideo = $(".right").find( "video" );

     $( ".left" ).mouseover(function() {
     	lvideo.get(0).play();
     	rvideo.get(0).pause();

     	$(".right").animate({
     		width: "0vw",
     	}, { duration: 1000, queue: false });

     	$(".lside").animate({
     		opacity: 1
     	}, { duration: 1000, queue: false });

     });

     $( ".lside" ).mouseover(function() {

     	$(".right").animate({
     		width: "230vw",
     	}, { duration: 1000, queue: false });

     	$(".lside").animate({
     		opacity: 0,
     	}, { duration: 1000, queue: false });

     });

     $( ".right" ).mouseover(function() {
     	rvideo.get(0).play();
     	lvideo.get(0).pause();

     	$(".right").animate({
     		width: "230vw",
     	}, { duration: 1000, queue: false });

     	$(".rside").animate({
     		opacity: 1
     	}, { duration: 1000, queue: false });

     });

     $( ".rside" ).mouseover(function() {

     	$(".right").animate({
     		width: "0vw",
     	}, { duration: 1000, queue: false });

     	$(".rside").animate({
     		opacity: 0,
     	}, { duration: 1000, queue: false });

     });